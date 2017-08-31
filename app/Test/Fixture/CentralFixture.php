<?php
/**
 * Central Fixture
 */
class CentralFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'latitud' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'longitud' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dirección' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'dirección' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:46:43',
			'modified' => '2017-08-16 18:46:43'
		),
            array(
			'id' => 2,
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'dirección' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:46:43',
			'modified' => '2017-08-16 18:46:43'
		),
            array(
			'id' => 3,
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'dirección' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:46:43',
			'modified' => '2017-08-16 18:46:43'
		),
	);

}
