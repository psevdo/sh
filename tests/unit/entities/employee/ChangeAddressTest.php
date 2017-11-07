<?php

namespace tests\unit\entities\employee;

use app\tests\unit\entities\employee\EmployeeBuilder;
use app\entities\employee\Address;
use app\entities\employee\events\EmployeeAddressChange;

class ChangeAddressTest extends \Codeception\Test\Unit {
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before() {
	}

	protected function _after() {
	}

	// tests
	public function testSuccess() {
		$employee = EmployeeBuilder::instance()->build();

		$employee->changeAddress($address = new Address('New', 'Test', 'Address', 'Street', '25a'));
		$this->tester->assertEquals($address, $employee->getAddress());

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		// $this->tester->assertInstanceOf(EmployeeAddressChange::class, $employee->getAddress());
		$this->tester->assertInstanceOf(EmployeeAddressChange::class, end($events));
	}
}