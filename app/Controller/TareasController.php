<?php

App::uses('AppController', 'Controller');
App::uses('CentralAuxiliar', 'Controller/Component');
App::uses('JornadaAuxiliar', 'Controller/Component');
App::uses('TareaAuxiliar', 'Controller/Component');

/**
 * Tareas Controller
 *
 * @property Tarea $Tarea
 * @property PaginatorComponent $Paginator
 */
class TareasController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('RequestHandler', 'Session', 'Planificador');
    public $helpers = array('Html', 'Form', 'Time', 'Js', 'Session');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Tarea.id' => 'asc'
        )
    );

    public function isAuthorized($user) {
        if ($user['role'] == 'supervisor') {
            if (in_array($this->action, array('add', 'index', 'planificar', 'edit', 'view', 'buscar', 'delete', 'tareasPendientes', 'tareasAsignadas', 'tareasDeclinadas', 'tareasAtendidas'))) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        if ($user['role'] == 'operario') {
            if (in_array($this->action, array('misTareas', 'finalizar', 'view', 'declinar'))) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Tarea->recursive = 0;
        $this->paginate['Tarea']['limit'] = 5;
        $this->paginate['Tarea']['order'] = array('Tarea.id' => 'asc');
//$this->paginate['User']['conditions']=array('User.rol'=>'asc');
        $this->set('tareas', $this->paginate());
    }

    /**
     * buscar method
     *
     * @return void
     */
    public function buscar() {
        $search = null;

        $this->loadModel("Central");
        $centrales = $this->Central->find('all');
        $centrals = array();
        foreach ($centrales as $c) {
            if ($c['Central']['dirección'] != 'INICIAL') {
                $key = $c['Central']['id'];
                $centrals["$key"] = $c['Central']['id'] . "-" . $c['Central']['dirección'];
            }
        }
        $this->set(compact('centrals'));
        if (!empty($this->request->query['search'])) {
            $search = $this->request->query['search'];
            $fecha = $search['year'] . '-' . $search['month'] . '-' . $search['day'];
            $conditions[] = array('Tarea.fecha LIKE' => $fecha, 'Tarea.estado LIKE' => 'pendiente');
            $tareas = $this->Tarea->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));
            $this->set(compact('tareas'));
            $elegida = $this->request->query['central'];
            $central = explode("-", $centrals["$elegida"])[0];
            $this->set(compact('central'));
            $conditions2[] = array('Jornada.fecha LIKE' => $fecha, 'Jornada.central_id LIKE' => $central);
            $this->loadModel("Jornada");
            $jornadas = $this->Jornada->find('all', array('recursive' => -1, 'conditions' => $conditions2, 'limit' => 200));
            $this->set(compact('jornadas'));
            $this->Session->write('jornadas', $jornadas);
            $this->Session->write('tareas', $tareas);
            $options = array('conditions' => array('Central.' . $this->Central->primaryKey => $central));
            $cen = $this->Central->find('first', $options);
            $this->Session->write('central', $cen['Central']);
        }
        $this->set(compact('search'));

        if ($this->request->is('ajax')) {
            $this->layout = false;
            $this->set('ajax', 1);
        } else {
            $this->set('ajax', 0);
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Tarea->exists($id)) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        $options = array('conditions' => array('Tarea.' . $this->Tarea->primaryKey => $id));
        $this->set('tarea', $this->Tarea->find('first', $options));
    }

    /**
     * misTareas method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function misTareas() {
        $id = $this->Auth->user('id');
        $query = $this->Tarea->find('all', array('joins' => array(
                array('table' => 'jornadas',
                    'alias' => 'd',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('Tarea.jornada_id = d.id'),
                )
            ),
            'conditions' => array('Jornada.user_id' => $id, 'Tarea.estado' => 'asignada'),
            'order' => array('Tarea.horaInicio' => 'ASC'),
        ));

        $this->set('tareas', $query);
    }

    /**
     * tareasPendientes method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function tareasPendientes() {
        $options = array('conditions' => array('Tarea.estado' => 'pendiente'));
        $this->set('tareas', $this->Tarea->find('all', $options));
    }

    public function tareasDeclinadas() {
        $options = array('conditions' => array('Tarea.estado' => 'declinada'));
        $this->set('tareas', $this->Tarea->find('all', $options));
    }

    /**
     * tareasAsignadas method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function tareasAsignadas() {
        $options = array('conditions' => array('Tarea.estado' => 'asignada'));
        $this->set('tareas', $this->Tarea->find('all', $options));
    }

    /**
     * tareasAtendidas method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function tareasAtendidas() {
        $options = array('conditions' => array('Tarea.estado' => 'atendida'));
        $this->set('tareas', $this->Tarea->find('all', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->request->data['Tarea']['estado'] = 'pendiente';
        $this->request->data['Tarea']['jornada_id'] = '4';
        if ($this->request->is('post')) {
            $this->Tarea->create();
            if ($this->Tarea->save($this->request->data)) {
                $this->Flash->success(__('The tarea has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
            }
        }
        $jornadas = $this->Tarea->Jornada->find('list');
        $this->set(compact('jornadas'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function planificar() {
        $tareas = $this->Session->read('tareas');
        $jornadas = $this->Session->read('jornadas');
        $central = $this->Session->read('central');
        $this->loadModel("Jornada");
        $resultado = $this->Planificador->distribuirTareas($tareas, $jornadas, $central);
        $this->set(compact('central'));
        $jor = $resultado[0];
        $this->set(compact('jor'));
        foreach ($jor as $j) {
            $idjornada = $j->getId();
            $minutoslibres = $j->getMinutosLibres();
            $options2 = array('conditions' => array('Jornada.id' => $idjornada));
            $datos2 = $this->Jornada->find('first', $options2);
            $datos2['Jornada']['minutoslibres'] = $minutoslibres;
            $this->Jornada->save($datos2);
            $tareas = $j->getTareas();
            foreach ($tareas as $t) {
                $idtarea = $t->getId();
                $options = array('conditions' => array('Tarea.id' => $idtarea));
                $datos = $this->Tarea->find('first', $options);
                $datos['Tarea']['estado'] = 'asignada';
                $datos['Tarea']['jornada_id'] = "$idjornada";
                $date = date_create($t->getHoraInicio());
                $datos['Tarea']['horaInicio'] = $date->format('Y-m-d H:i:s');
                $date = date_create($t->getHoraFin());
                $datos['Tarea']['horaFin'] = $date->format('Y-m-d H:i:s');
                $this->Tarea->save($datos);
            }
        }
        $this->Session->write('jornadas');
    }

    /**
     * finalizar method
     *
     * @return void
     */
    public function finalizar($id = null) {
        $options = array('conditions' => array('Tarea.id' => $id));
        $tarea = $this->Tarea->find('first', $options);
        $tarea['Tarea']['estado'] = 'atendida';
        if ($this->Tarea->save($tarea)) {
            //$this->Session->setFlash('La tarea se ha marcado como finalizada', 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'misTareas'));
        }
    }

    /**
     * declinar method
     *
     * @return void
     */
    public function declinar($id = null) {
        $options = array('conditions' => array('Tarea.id' => $id));
        $tarea = $this->Tarea->find('first', $options);

        $idjornada = $tarea['Tarea']['jornada_id'];
        $lasttarea = $this->Tarea->find('all', array(
            'limit' => 1,
            'order' => array(
                'Tarea.horaFin DESC'
            )
        ));
        $this->loadModel("Jornada");
        $options2 = array('conditions' => array('Jornada.id' => $idjornada));
        $jornada = $this->Jornada->find('first', $options2);
        $lat1 = $tarea['Tarea']['latitud'];
        $lat2 = $lasttarea[0]['Tarea']['latitud'];
        $long1 = $tarea['Tarea']['longitud'];
        $long2 = $lasttarea[0]['Tarea']['longitud'];
        $dist = $this->Planificador->distanciaEntreDosById($lat1, $lat2, $long1, $long2);
        $dur = $tarea['Tarea']['total'];
        $total = $dist + $dur;
        if ($total <= $jornada['Jornada']['minutoslibres']) {
            $min = $jornada['Jornada']['minutoslibres'] - $total;
            $this->Jornada->save($jornada);
            $tarea['Tarea']['estado'] = 'asignada';
            $horaini = $this->Planificador->sumarHora($lasttarea[0]['Tarea']['horaFin'], $dist);
            $horafin = $this->Planificador->sumarHora($horaini, $dur);
            $horainicio= strtotime($horaini);
            $horafinal= strtotime($horafin);
            $tarea['Tarea']['horaInicio'] = date('Y-m-d H:i:s',$horainicio);
            $tarea['Tarea']['horaFin'] = date('Y-m-d H:i:s',$horafinal);
        } else {
            $tarea['Tarea']['estado'] = 'declinada';
            $tarea['Tarea']['jornada_id'] = '4';
        }
        $this->Tarea->save($tarea);
        $this->set(compact('tarea'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Tarea->exists($id)) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tarea->save($this->request->data)) {
                $this->Flash->success(__('The tarea has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tarea.' . $this->Tarea->primaryKey => $id));
            $this->request->data = $this->Tarea->find('first', $options);
        }
        $jornadas = $this->Tarea->Jornada->find('list');
        $this->set(compact('jornadas'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Tarea->id = $id;
        if (!$this->Tarea->exists()) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tarea->delete()) {
            $this->Flash->success(__('The tarea has been deleted.'));
        } else {
            $this->Flash->error(__('The tarea could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Tarea->recursive = 0;
        $this->set('tareas', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Tarea->exists($id)) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        $options = array('conditions' => array('Tarea.' . $this->Tarea->primaryKey => $id));
        $this->set('tarea', $this->Tarea->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Tarea->create();
            if ($this->Tarea->save($this->request->data)) {
                $this->Flash->success(__('The tarea has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
            }
        }
        $jornadas = $this->Tarea->Jornada->find('list');
        $this->set(compact('jornadas'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Tarea->exists($id)) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tarea->save($this->request->data)) {
                $this->Flash->success(__('The tarea has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The tarea could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tarea.' . $this->Tarea->primaryKey => $id));
            $this->request->data = $this->Tarea->find('first', $options);
        }
        $jornadas = $this->Tarea->Jornada->find('list');
        $this->set(compact('jornadas'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Tarea->id = $id;
        if (!$this->Tarea->exists()) {
            throw new NotFoundException(__('Invalid tarea'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tarea->delete()) {
            $this->Flash->success(__('The tarea has been deleted.'));
        } else {
            $this->Flash->error(__('The tarea could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
