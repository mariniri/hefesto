<?php

App::uses('AppController', 'Controller');

/**
 * Jornadas Controller
 *
 * @property Jornada $Jornada
 * @property PaginatorComponent $Paginator
 */
class JornadasController extends AppController {

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
            'Jornada.id' => 'asc'
        )
    );

    public function isAuthorized($user) {
        if ($user['role'] == 'supervisor') {
            if (in_array($this->action, array('add','edit', 'index', 'view', 'delete'))) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        if ($user['role'] == 'operario') {
            if (in_array($this->action, array('misJornadas','view'))) {
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
        $this->Jornada->recursive = 0;
        $this->paginate['Jornada']['limit'] = 5;
        $this->paginate['Jornada']['order'] = array('Jornada.id' => 'asc');
        //$this->paginate['User']['conditions']=array('User.rol'=>'asc');
        $this->set('jornadas', $this->paginate());
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
            $fecha=$search['year'].'-'.$search['month'].'-'.$search['day'];
            $conditions[] = array('Jornada.fecha LIKE' => $fecha );

            $jornadas = $this->Tarea->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 200));

            $this->set(compact('jornadas'));
        }
        $this->set(compact('search'));

        if ($this->request->is('ajax')) {
            $this->layout = false;
            $this->set('ajax', 1);
        } else {
            $this->set('ajax', 0);
        }
        $this->redirect('/tareas/buscar');
    }
    
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Jornada->exists($id)) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        $options = array('conditions' => array('Jornada.' . $this->Jornada->primaryKey => $id));
        $this->set('jornada', $this->Jornada->find('first', $options));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function misJornadas() {
        $id = $this->Auth->user('id');
        $options = array('conditions' => array('Jornada.user_id' => $id));
        $this->set('jornadas', $this->Jornada->find('all', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Jornada->create();
            if ($this->Jornada->save($this->request->data)) {
                $this->Flash->success(__('The jornada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
            }
        }
        $users = $this->Jornada->User->find('list');
        $centrals = $this->Jornada->Central->find('list');
        $this->set(compact('users', 'centrals'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Jornada->exists($id)) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Jornada->save($this->request->data)) {
                $this->Flash->success(__('The jornada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Jornada.' . $this->Jornada->primaryKey => $id));
            $this->request->data = $this->Jornada->find('first', $options);
        }
        $users = $this->Jornada->User->find('list');
        $centrals = $this->Jornada->Central->find('list');
        $this->set(compact('users', 'centrals'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Jornada->id = $id;
        if (!$this->Jornada->exists()) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Jornada->delete()) {
            $this->Flash->success(__('The jornada has been deleted.'));
        } else {
            $this->Flash->error(__('The jornada could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Jornada->recursive = 0;
        $this->set('jornadas', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Jornada->exists($id)) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        $options = array('conditions' => array('Jornada.' . $this->Jornada->primaryKey => $id));
        $this->set('jornada', $this->Jornada->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Jornada->create();
            if ($this->Jornada->save($this->request->data)) {
                $this->Flash->success(__('The jornada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
            }
        }
        $users = $this->Jornada->User->find('list');
        $centrals = $this->Jornada->Central->find('list');
        $this->set(compact('users', 'centrals'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Jornada->exists($id)) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Jornada->save($this->request->data)) {
                $this->Flash->success(__('The jornada has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The jornada could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Jornada.' . $this->Jornada->primaryKey => $id));
            $this->request->data = $this->Jornada->find('first', $options);
        }
        $users = $this->Jornada->User->find('list');
        $centrals = $this->Jornada->Central->find('list');
        $this->set(compact('users', 'centrals'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Jornada->id = $id;
        if (!$this->Jornada->exists()) {
            throw new NotFoundException(__('Invalid jornada'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Jornada->delete()) {
            $this->Flash->success(__('The jornada has been deleted.'));
        } else {
            $this->Flash->error(__('The jornada could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
