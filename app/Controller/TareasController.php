<?php

App::uses('AppController', 'Controller');

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
    public $components = array('RequestHandler');
    public $helpers = array('Html', 'Form', 'Time', 'Js');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Tarea.id' => 'asc'
        )
    );

    public function isAuthorized($user) {
        if ($user['role'] == 'supervisor') {
            if (in_array($this->action, array('add', 'index', 'edit', 'view', 'buscar', 'delete', 'tareasPendientes', 'tareasPlanificadas', 'tareasAtendidas'))) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        if ($user['role'] == 'operario') {
            if (in_array($this->action, array('misTareas', 'view'))) {
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
        if (!empty($this->request->query['search'])) {
            $search = $this->request->query['search'];
            $fecha = $search['year'] . '-' . $search['month'] . '-' . $search['day'];
            $conditions[] = array('Tarea.fecha LIKE' => $fecha, 'Tarea.estado LIKE' => 'pendiente');

            $tareas = $this->Tarea->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));

            $this->set(compact('tareas'));

            $conditions2[] = array('Jornada.fecha LIKE' => $fecha);
            $this->loadModel("Jornada");
            $jornadas = $this->Jornada->find('all', array('recursive' => -1, 'conditions' => $conditions2, 'limit' => 200));
            $this->set(compact('jornadas'));
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
                    'conditions' => array('Tarea.jornada_id = d.id')
                )
            ),
            'conditions' => array('Jornada.user_id' => $id)
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
     * tareasPlanificadas method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function tareasPlanificadas() {
        $options = array('conditions' => array('Tarea.estado' => 'planificada'));
        $this->set('tareas', $this->Tarea->find('all', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
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
