<?php
/**
 * Jornada Fixture
 */
class JornadaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'inicio' => array('type' => 'timestamp', 'null' => true, 'default' => null, 'length' => 6),
		'fin' => array('type' => 'timestamp', 'null' => true, 'default' => null, 'length' => 6),
		'horaInicio' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'horafin' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'minutoslibres' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'central_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_jornada_usuario_idx' => array('column' => 'user_id', 'unique' => 0),
			'fk_jornada_central1_idx' => array('column' => 'central_id', 'unique' => 0)
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
			'inicio' => 1502902268,
			'fin' => 1502902268,
			'horaInicio' => '2017-08-16 18:51:08',
			'horafin' => '2017-08-16 18:51:08',
			'total' => 1,
			'fecha' => '2017-08-16',
			'minutoslibres' => 1,
			'created' => '2017-08-16 18:51:08',
			'modified' => '2017-08-16 18:51:08',
			'user_id' => 1,
			'central_id' => 1
		),
            array(
			'id' => 2,
			'inicio' => 1502902268,
			'fin' => 1502902268,
			'horaInicio' => '2017-08-16 18:51:08',
			'horafin' => '2017-08-16 18:51:08',
			'total' => 1,
			'fecha' => '2017-08-16',
			'minutoslibres' => 1,
			'created' => '2017-08-16 18:51:08',
			'modified' => '2017-08-16 18:51:08',
			'user_id' => 2,
			'central_id' => 2
		),array(
			'id' => 3,
			'inicio' => 1502902268,
			'fin' => 1502902268,
			'horaInicio' => '2017-08-16 18:51:08',
			'horafin' => '2017-08-16 18:51:08',
			'total' => 1,
			'fecha' => '2017-08-16',
			'minutoslibres' => 1,
			'created' => '2017-08-16 18:51:08',
			'modified' => '2017-08-16 18:51:08',
			'user_id' => 3,
			'central_id' => 3
		),
	);

}
