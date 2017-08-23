<?php

App::uses('AppModel', 'Model');

/**
 * Central Model
 *
 * @property Jornada $Jornada
 */
class Central extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'dirección';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'latitud' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La latitud no puede estar vacía',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'latitud' => array(
                'rule' => '^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}^',
                'message' => 'Latitud incorrecta'
            )
        ),
        'longitud' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La longitud no puede estar vacía',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'longitud' => array(
                'rule' => '^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}^',
                'message' => 'Longitud incorrecta'
            )
        ),
        'dirección' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La dirección no puede estar vacía',
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
            'foreignKey' => 'central_id',
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

}
