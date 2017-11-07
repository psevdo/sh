<?php

namespace tests\unit\entities\employee;

use app\tests\unit\entities\employee\EmployeeBuilder;
use app\entities\employee\Phone;
use app\entities\employee\events\EmployeePhoneAdded;
use app\entities\employee\events\EmployeePhoneRemoved;

class PhonesTest extends \Codeception\Test\Unit {
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected function _before() {
	}

	protected function _after() {
	}

	public function testAdd() {
		$employee = EmployeeBuilder::instance()->build();

		$employee->addPhone($phone = new Phone(7, '888', '00000001'));

		$this->tester->assertNotEmpty($phones = $employee->getPhones());
		$this->tester->assertEquals($phone, end($phones));

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeePhoneAdded::class, end($events));
	}

	public function testAddExists() {
		$employee = EmployeeBuilder::instance()
			->withPhones([$phone = new Phone(7, '888', '00000001')])
			->build();

		$this->expectExceptionMessage('Phone already exists.');

		$employee->addPhone($phone);
	}

	public function testRemove() {
		$employee = EmployeeBuilder::instance()
			->withPhones([
				new Phone(7, '888', '00000001'),
				new Phone(7, '888', '00000002'),
			])
			->build();

		$this->tester->assertCount(2, $employee->getPhones());

		$employee->removePhone(1);

		$this->tester->assertCount(1, $employee->getPhones());

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeePhoneRemoved::class, end($events));
	}

	public function testRemoveNotExists() {
		$employee = EmployeeBuilder::instance()->build();

		$this->expectExceptionMessage('Phone not found.');

		$employee->removePhone(42);
	}

	public function testRemoveLast() {
		$employee = EmployeeBuilder::instance()
			->withPhones([
				new Phone(7, '888', '00000001'),
			])
			->build();

		$this->expectExceptionMessage('Cannot remove the last phone.');

		$employee->removePhone(0);
	}
}