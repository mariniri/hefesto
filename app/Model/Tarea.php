<?php

App::uses('AppModel', 'Model');

/**
 * Tarea Model
 *
 * @property Jornada $Jornada
 */
class Tarea extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'direccion';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'estado' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Por favor seleccione un estado',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'total' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Sólo numeros',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La duración de la tarea no puede estar vacía',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
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
        'fecha' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'La fecha no es correcta',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La fecha no puede estar vacía',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'direccion' => array(
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
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Jornada' => array(
            'className' => 'Jornada',
            'foreignKey' => 'jornada_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
