<?php

App::uses('AppController', 'Controller');

/**
 * Centrals Controller
 *
 * @property Central $Central
 * @property PaginatorComponent $Paginator
 */
class CentralsController extends AppController {

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
            'Central.id' => 'asc'
        )
    );

    public function isAuthorized($user) {
        if ($user['role'] == 'supervisor') {
            if (in_array($this->action, array('add', 'edit', 'index', 'view', 'delete'))) {
                return true;
            } else {
                if ($this->Auth->user('id')) {
                    $this->Session->setFlash('No puede acceder', 'default', array('class' => 'alert alert-danger'));
                    $this->redirect($this->Auth->redirect());
                }
            }
        }
        if ($user['role'] == 'operario') {
            if (in_array($this->action, array('index', 'view'))) {
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
        $this->Central->recursive = 0;
        $this->paginate['Central']['limit'] = 5;
        $this->paginate['Central']['order'] = array('Central.id' => 'asc');
        //$this->paginate['User']['conditions']=array('User.rol'=>'asc');
        $this->set('centrals', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Central->exists($id)) {
            throw new NotFoundException(__('Invalid central'));
        }
        $options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
        $this->set('central', $this->Central->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Central->create();
            if ($this->Central->save($this->request->data)) {
                $this->Session->setFlash('Cambios guardados correctamente', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The central could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Central->exists($id)) {
            throw new NotFoundException(__('Invalid central'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Central->save($this->request->data)) {
		$this->Session->setFlash('The cocinero has been saved.', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The central could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
            $this->request->data = $this->Central->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Central->id = $id;
        if (!$this->Central->exists()) {
            throw new NotFoundException(__('Invalid central'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Central->delete()) {
            $this->Session->setFlash('Cambios guardados correctamente', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Flash->error(__('The central could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Central->recursive = 0;
        $this->set('centrals', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Central->exists($id)) {
            throw new NotFoundException(__('Invalid central'));
        }
        $options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
        $this->set('central', $this->Central->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Central->create();
            if ($this->Central->save($this->request->data)) {
                $this->Session->setFlash('Cambios guardados correctamente', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The central could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Central->exists($id)) {
            throw new NotFoundException(__('Invalid central'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Central->save($this->request->data)) {
                $this->Session->setFlash('Cambios guardados correctamente', 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The central could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Central.' . $this->Central->primaryKey => $id));
            $this->request->data = $this->Central->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Central->id = $id;
        if (!$this->Central->exists()) {
            throw new NotFoundException(__('Invalid central'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Central->delete()) {
            $this->Session->setFlash('Cambios guardados correctamente', 'default', array('class' => 'alert alert-success'));
        } else {
            $this->Flash->error(__('The central could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
