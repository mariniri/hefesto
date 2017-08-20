<?php
App::uses('Central', 'Model');

/**
 * Central Test Case
 */
class CentralTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.central',
		'app.jornada'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Central = ClassRegistry::init('Central');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Central);

		parent::tearDown();
	}

}
