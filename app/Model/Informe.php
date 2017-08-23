<?php

App::uses('AppModel', 'Model');

/**
 * Informe Model
 *
 * @property Jornada $Jornada
 */
class Informe extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'nombre';

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
        'descripcion' => array(
            'characters' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Solo letras y números'
            ),
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'La descripción no puede estar vacía',
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
