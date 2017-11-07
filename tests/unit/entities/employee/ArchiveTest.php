<?php

namespace tests\unit\entities\employee;

use app\tests\unit\entities\employee\EmployeeBuilder;
use app\entities\employee\events\EmployeeArchived;

class ArchiveTest extends \Codeception\Test\Unit {
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

		$this->tester->assertTrue($employee->isActive());
		$this->tester->assertFalse($employee->isArchived());

		$employee->archive($date = new \DateTimeImmutable('2011-06-05'));

		$this->tester->assertFalse($employee->isActive());
		$this->tester->assertTrue($employee->isArchived());

		// $this->tester->assertNotEmpty($statuses = $employee->getStatuses());
		// $this->tester->assertTrue(end($statuses)->isArchived());

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeeArchived::class, end($events));
	}
}