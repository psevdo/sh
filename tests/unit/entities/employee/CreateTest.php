<?php

namespace tests\unit\entities\employee;

use app\entities\employee\Employee;
use app\entities\employee\EmployeeId;
use app\entities\employee\Address;
use app\entities\employee\Name;
use app\entities\employee\Phone;
use app\entities\employee\events\EmployeeCreated;

class CreateTest extends \Codeception\Test\Unit {
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
		$employee = new Employee(
			$id = new EmployeeId(25),
			$name = new Name('Пупкин', 'Василий', 'Петрович'),
			$address = new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 25),
			$phones = [
				new Phone(7, '920', '00000001'),
				new Phone(7, '920', '00000002')
			]
		);

		$this->tester->assertEquals($id, $employee->getId());
		$this->tester->assertEquals($name, $employee->getName());
		$this->tester->assertEquals($address, $employee->getAddress());
		$this->tester->assertEquals($phones, $employee->getPhones());

		$this->tester->assertNotNull($employee->getCreateDate());
		$this->tester->assertTrue($employee->isActive());
		$this->tester->assertCount(1, $statuses = $employee->getStatuses());
		$this->tester->assertTrue(end($statuses)->isActive());

		$this->tester->assertNotEmpty($events = $employee->releaseEvents());
		$this->tester->assertInstanceOf(EmployeeCreated::class, end($events));
	}

	public function testWithoutPhones() {
		$this->expectException('Employee must contain at least one phone.');

		new Employee(
			new EmployeeId(25),
			new Name('Пупкин', 'Василий', 'Петрович'),
			new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 25),
			[]
		);
	}

	public function testWithSamePhoneNumbers() {
		$this->expectException('Phone already exist');

		new Employee(
			new EmployeeId(25),
			new Name('Пупкин', 'Василий', 'Петрович'),
			new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 25),
			[
				new Phone(7, '920', '00000001'),
				new Phone(7, '920', '00000001'),
			]
		);
	}

}