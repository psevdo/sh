<?php

namespace tests\unit\entities\employee;

use app\tests\unit\entities\employee\EmployeeBuilder;
use app\entities\employee\Name;
use app\entities\employee\events\EmployeeRenamed;

class RenameTest extends \Codeception\Test\Unit {
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
		$employee->rename($name = new Name('New', 'Test', 'Name'));
		$this->tester->assertEquals($name, $employee->getName());

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeeRenamed::class, end($events));
	}
}