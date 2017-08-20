<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class WelcomeController extends AppController {

    public function isAuthorized($user) {
        return true;
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
    }

}
