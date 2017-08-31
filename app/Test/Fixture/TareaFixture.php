<?php
/**
 * Tarea Fixture
 */
class TareaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'estado' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'inicio' => array('type' => 'timestamp', 'null' => true, 'default' => null, 'length' => 6),
		'fin' => array('type' => 'timestamp', 'null' => true, 'default' => null, 'length' => 6),
		'horaInicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'horaFin' => array('type' => 'date', 'null' => true, 'default' => null),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'longitud' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'latitud' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'distanciaCentral' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'fecha' => array('type' => 'date', 'null' => true, 'default' => null),
		'direccion' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 250, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'jornada_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_tarea_jornada1_idx' => array('column' => 'jornada_id', 'unique' => 0)
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
			'estado' => 'pendiente',
			'inicio' => 1502902681,
			'fin' => 1502902681,
			'horaInicio' => '2017-08-16',
			'horaFin' => '2017-08-16',
			'total' => 1,
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'distanciaCentral' => 1,
			'fecha' => '2017-08-16',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:58:01',
			'modified' => '2017-08-16 18:58:01',
			'jornada_id' => 1
		),
            array(
			'id' => 1,
			'estado' => 'Lorem asignada',
			'inicio' => 1502902681,
			'fin' => 1502902681,
			'horaInicio' => '2017-08-16',
			'horaFin' => '2017-08-16',
			'total' => 1,
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'distanciaCentral' => 1,
			'fecha' => '2017-08-16',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:58:01',
			'modified' => '2017-08-16 18:58:01',
			'jornada_id' => 2
		),
            array(
			'id' => 1,
			'estado' => 'atendida',
			'inicio' => 1502902681,
			'fin' => 1502902681,
			'horaInicio' => '2017-08-16',
			'horaFin' => '2017-08-16',
			'total' => 1,
			'latitud' => '37.355241',
			'longitud' => '-5.988678',
			'distanciaCentral' => 1,
			'fecha' => '2017-08-16',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'created' => '2017-08-16 18:58:01',
			'modified' => '2017-08-16 18:58:01',
			'jornada_id' => 3
		)
	);

}
