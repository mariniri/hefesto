<?php

/**
 * User Fixture
 */
class UserFixture extends CakeTestFixture {

    /**
     * Fields
     *
     * @var array
     */
    public $fields = array(
        'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
        'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'apellidos' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'role' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'indexes' => array(
            'PRIMARY' => array('column' => 'id', 'unique' => 1)
        ),
        'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
    );

    /**
     * Records
     *
     * @var array
     */
    public $records = array(
        array(
            'id' => 1,
            'nombre' => 'Maria',
            'apellidos' => 'lopez',
            'telefono' => '77777777',
            'email' => 'mlopez@gmail.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'username' => 'mlopez',
            'role' => 'operario',
            'created' => '2017-08-18 11:35:29',
            'modified' => '2017-08-18 11:35:29'
        ),
        array(
            'id' => 2,
            'nombre' => 'Antonio',
            'apellidos' => 'Rueda',
            'telefono' => '77777777',
            'email' => 'arueda@gmail.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'username' => 'arueda',
            'role' => 'supervisor',
            'created' => '2017-08-18 11:35:29',
            'modified' => '2017-08-18 11:35:29'
        ), array(
            'id' => 3,
            'nombre' => 'Sergio',
            'apellidos' => 'Guerrero',
            'telefono' => '77777777',
            'email' => 'sguerrero@gmail.com',
            'password' => 'Lorem ipsum dolor sit amet',
            'username' => 'sguerrero',
            'role' => 'operario',
            'created' => '2017-08-18 11:35:29',
            'modified' => '2017-08-18 11:35:29'
        )
    );

}
