<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 13:13
 */

namespace tests\unit\repositories;


use app\entities\employee\EmployeeId;
use app\entities\employee\Phone;
use app\entities\employee\Name;
use app\repositories\NotFoundException;
use app\tests\unit\entities\employee\EmployeeBuilder;
use Codeception\Test\Unit;
use tests\_fixtures\EmployeeFixture;
use tests\_fixtures\EmployeePhoneFixture;
use tests\_fixtures\EmployeeStatusFixture;

abstract class BaseRepositoryTest extends Unit {

	protected $repository;
	protected $tester;

	public function testGet() {
		$this->repository->add($employee = EmployeeBuilder::instance()->build());

		$found = $this->repository->get($employee->getId());

		$this->tester->assertNotNull($found);
		$this->tester->assertEquals($employee->getId(), $found->getId());
	}

	public function testGetNotFound() {
		$this->expectException(NotFoundException::class);

		$this->repository->get(new EmployeeId(25));
	}

	public function testAdd() {
		$employee = EmployeeBuilder::instance()
			->withId(2)
			->withPhones([
				new Phone(7, '888', '00000001'),
				new Phone(7, '888', '00000002'),
			])
			->build();

		$this->repository->add($employee);

		$found = $this->repository->get($employee->getId());

		$this->tester->assertEquals($employee->getId(), $found->getId());
		$this->tester->assertEquals($employee->getAddress(), $found->getAddress());
		$this->tester->assertEquals($employee->getName(), $found->getName());
	}

	public function testSave() {
		$employee = EmployeeBuilder::instance()
			->withId(3)
			->withPhones([
				new Phone(7, '888', '00000001'),
				new Phone(7, '888', '00000002'),
			])
			->build();

		$this->repository->add($employee);

		$edit = $this->repository->get($employee->getId());

		$edit->rename($name = new Name('New', 'Test', 'Name'));
		$edit->addPhone($phone = new Phone(7, '888', '00000003'));
		$edit->archive(new \DateTimeImmutable());

		$this->repository->save($edit);

		$found = $this->repository->get($employee->getId());

		$this->assertTrue($found->isArchived());
		$this->assertEquals($name, $found->getName());
	}

	public function testRemove() {
		$employee = EmployeeBuilder::instance()->withId(5)->build();
		$this->repository->add($employee);

		$this->repository->remove($employee);

		$this->expectException(NotFoundException::class);

		$this->repository->get(new EmployeeId(5));
	}

}