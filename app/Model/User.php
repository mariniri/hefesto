<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

/**
 * User Model
 *
 * @property Jornada $Jornada
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'apellidos';
    public $actsAs = array(
        'Notification.Notifiable' => array(
            'subjects' => array('User', 'Post', 'Comment')
        )
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'nombre' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'El nombre no puede estar vacío',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'apellidos' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Los apellidos no pueden estar vacíos',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'telefono' => array(
            'phone' => array(
                'rule' => array('phone'),
                'message' => 'El teléfono no es correcto',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'El teléfono no puede estar vacío',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
                'message' => 'El email no es correcto',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'El email no puede estar vacío',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'password' => array(
            'minlength' => array(
                'rule' => array('minLength', '8'),
                'message' => 'La contraseña debe tener al menos 8 caracteres'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'No puede estar vacía',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo debe tener letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo debe tener letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Seleccione un rol, por favor',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    // The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Jornada' => array(
            'className' => 'Jornada',
            'foreignKey' => 'user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

}
