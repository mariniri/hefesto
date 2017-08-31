<?php

App::uses('CentralsController', 'Controller');

use App\Controller\CentralsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

/**
 * CentralsController Test Case
 */
class CentralsControllerTest extends ControllerTestCase {

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
     * testIndex method
     *
     * @return void
     */
    public function testIndex() {
        $this->get('/centrals?page=1');

// Check for a 2xx response code
        $this->assertResponseOk();

// Assert partial response content
        $this->assertResponseContains('Lorem ipsum dolor sit amet');
    }

    /**
     * testView method
     *
     * @return void
     */
    public function testView() {
        $this->get('/centrals/view/2');

// Check for a 2xx response code
        $this->assertResponseOk();

// Assert partial response content
        $this->assertResponseContains('Lorem ipsum dolor sit amet');
    }

    /**
     * testAdd method
     *
     * @return void
     */
    public function testAdd() {
        $this->get('/centrals/add');

// Check for a 2xx response code
        $this->assertResponseOk();

        $data = [
            'id' => 20,
            'latitud' => '37.355241',
            'longitud' => '-5.988678',
            'dirección' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-08-16 18:46:43',
            'modified' => '2017-08-16 18:46:43'
        ];
        $this->post('/centrals/add', $data);

// Check for a 2xx response code
        $this->assertResponseSuccess();

// Assert view variables
        $users = TableRegistry::get('Centrals');
        $query = $users->find()->where(['dirección' => $data['dirección']]);
        $this->assertEquals(1, $query->count());
    }

    /**
     * testEdit method
     *
     * @return void
     */
    public function testEdit() {
        $this->markTestIncomplete('testEdit not implemented.');
    }

    /**
     * testDelete method
     *
     * @return void
     */
    public function testDelete() {
        $this->delete('/centrals/delete/1');

// Check for a 2xx/3xx response code
        $this->assertResponseSuccess();

        $users = TableRegistry::get('Centrals');
        $data = $users->find()->where(['id' => 3]);
        $this->assertEquals(0, $data->count());
    }

}
