<?php
/**
 * Informe Fixture
 */
class InformeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'datos' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'jornada_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'jornada_id'), 'unique' => 1),
			'fk_informe_jornada1_idx' => array('column' => 'jornada_id', 'unique' => 0)
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'datos' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 19:04:12',
			'modified' => '2017-08-16 19:04:12',
			'jornada_id' => 1
		),array(
			'id' => 2,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'datos' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 19:04:12',
			'modified' => '2017-08-16 19:04:12',
			'jornada_id' => 2
		),array(
			'id' => 3,
			'nombre' => 'Lorem ipsum dolor sit amet',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'datos' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 19:04:12',
			'modified' => '2017-08-16 19:04:12',
			'jornada_id' => 3
		),
	);

}
