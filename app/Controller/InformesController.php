<?php

App::uses('AppController', 'Controller');

/**
 * Informes Controller
 *
 * @property Informe $Informe
 * @property PaginatorComponent $Paginator
 */
class InformesController extends AppController {

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
            'Informe.id' => 'asc'
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
            if (in_array($this->action, array('misInformes','view'))) {
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
        $this->Informe->recursive = 0;
        $this->paginate['Informe']['limit'] = 5;
        $this->paginate['Informe']['order'] = array('Informe.id' => 'asc');
//$this->paginate['User']['conditions']=array('User.rol'=>'asc');
        $this->set('informes', $this->paginate());
    }

    /**
     * indexPropias method
     *
     * @return void
     */
    public function misInformes() {
        $id = $this->Auth->user('id');
        $query = $this->Informe->find('all', array('joins' => array(
                array('table' => 'jornadas',
                    'alias' => 'd',
                    'type' => 'left',
                    'foreignKey' => false,
                    'conditions' => array('Informe.jornada_id = d.id')
                )
            ),
            'conditions' => array('Jornada.user_id' => $id)
        ));

        $this->set('informes', $query);
    }

    
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Informe->exists($id)) {
            throw new NotFoundException(__('Invalid informe'));
        }
        $options = array('conditions' => array('Informe.' . $this->Informe->primaryKey => $id));
        $this->set('informe', $this->Informe->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Informe->create();
            if ($this->Informe->save($this->request->data)) {
                $this->Flash->success(__('The informe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The informe could not be saved. Please, try again.'));
            }
        }
        $jornadas = $this->Informe->Jornada->find('list');
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
        if (!$this->Informe->exists($id)) {
            throw new NotFoundException(__('Invalid informe'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Informe->save($this->request->data)) {
                $this->Flash->success(__('The informe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The informe could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Informe.' . $this->Informe->primaryKey => $id));
            $this->request->data = $this->Informe->find('first', $options);
        }
        $jornadas = $this->Informe->Jornada->find('list');
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
        $this->Informe->id = $id;
        if (!$this->Informe->exists()) {
            throw new NotFoundException(__('Invalid informe'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Informe->delete()) {
            $this->Flash->success(__('The informe has been deleted.'));
        } else {
            $this->Flash->error(__('The informe could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Informe->recursive = 0;
        $this->set('informes', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Informe->exists($id)) {
            throw new NotFoundException(__('Invalid informe'));
        }
        $options = array('conditions' => array('Informe.' . $this->Informe->primaryKey => $id));
        $this->set('informe', $this->Informe->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Informe->create();
            if ($this->Informe->save($this->request->data)) {
                $this->Flash->success(__('The informe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The informe could not be saved. Please, try again.'));
            }
        }
        $jornadas = $this->Informe->Jornada->find('list');
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
        if (!$this->Informe->exists($id)) {
            throw new NotFoundException(__('Invalid informe'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Informe->save($this->request->data)) {
                $this->Flash->success(__('The informe has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The informe could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Informe.' . $this->Informe->primaryKey => $id));
            $this->request->data = $this->Informe->find('first', $options);
        }
        $jornadas = $this->Informe->Jornada->find('list');
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
        $this->Informe->id = $id;
        if (!$this->Informe->exists()) {
            throw new NotFoundException(__('Invalid informe'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Informe->delete()) {
            $this->Flash->success(__('The informe has been deleted.'));
        } else {
            $this->Flash->error(__('The informe could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
