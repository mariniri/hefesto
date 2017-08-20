<?php
App::uses('Jornada', 'Model');

/**
 * Jornada Test Case
 */
class JornadaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jornada',
		'app.user',
		'app.central',
		'app.informe',
		'app.tarea'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Jornada = ClassRegistry::init('Jornada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Jornada);

		parent::tearDown();
	}

}
