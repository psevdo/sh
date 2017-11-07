<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 03.11.2017
 * Time: 11:35
 */

namespace app\entities\employee;

use app\entities\IAggregateRoot;
use app\entities\EventTrait;

class Employee implements IAggregateRoot {

	use EventTrait;

	private $id;
	private $name;
	private $address;
	private $phones = [];
	private $createDate;
	private $statuses = [];

	public function __construct(EmployeeId $id, Name $name, Address $address, array $phones) {
		if(!$phones) {
			throw new \DomainException('Employee must contain at least one phone.');
		}

		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
		$this->phones = new Phones($phones);
		$this->createDate = new \DateTimeImmutable();
		$this->addStatus(Status::ACTIVE, $this->createDate);

		$this->recordEvent(new events\EmployeeCreated($this->id));
	}

	private function addStatus($value, \DateTimeImmutable $date) {
		$this->statuses[] = new Status($value, $date);
	}

	public function rename(Name $name) {
		$this->name = $name;
		$this->recordEvent(new events\EmployeeRenamed($this->id, $name));
	}

	public function changeAddress(Address $address) {
		$this->address = $address;
		$this->recordEvent(new events\EmployeeAddressChange($this->id, $address));
	}

	/**
	 * @return Address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @return Name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getCreateDate() {
		return $this->createDate;
	}

	/**
	 * @return array
	 */
	public function getStatuses() {
		return $this->statuses;
	}






	public function getId() {
		return $this->id;
	}

	public function archive(\DateTimeImmutable $date) {
		if($this->isArchived()) {
			throw new \DomainException('Employee is already archived.');
		}

		$this->addStatus(Status::ARCHIVED, $date);
		$this->recordEvent(new events\EmployeeArchived($this->id, $date));
	}

	public function reinstate(\DateTimeImmutable $date) {
		if(!$this->isArchived()) {
			throw new \DomainException('Employee is not archived.');
		}

		$this->addStatus(Status::ACTIVE, $date);
		$this->recordEvent(new events\EmployeeReinstated, $date);
	}

	public function isActive() {
		return $this->getCurrentStatus()->isActive();
	}

	public function isArchived() {
		return $this->getCurrentStatus()->isArchived();
	}

	private function getCurrentStatus() {
		return end($this->statuses);
	}

	public function remove() {
		if(!$this->isArchived()) {
			throw new \DomainException('Cannot remove active employee.');
		}

		$this->recordEvent(new events\EmployeeRemoved($this->id));
	}

	public function addPhone(Phone $phone) {
		$this->phones->add($phone);
		$this->recordEvent(new events\EmployeePhoneAdded($this->id, $phone));
	}

	public function removePhone($index) {
		$phone = $this->phones->remove($index);
		$this->recordEvent(new events\EmployeePhoneRemoved($this->id, $phone));
	}

	public function getPhones() {
		return $this->phones->getAll();
	}

}