<?php

namespace tests\unit\entities\employee;

use app\tests\unit\entities\employee\EmployeeBuilder;
use app\entities\employee\events\EmployeeRemoved;

class RemoveTest extends \Codeception\Test\Unit {
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
		$employee = EmployeeBuilder::instance()->archived()->build();

		$employee->remove();

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeeRemoved::class, end($events));
	}

	public function testNotArchived() {
		$employee = EmployeeBuilder::instance()->build();

		$this->expectExceptionMessage('Cannot remove active employee.');
		$employee->remove();
	}
}