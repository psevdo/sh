<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 01.11.2017
 * Time: 13:57
 */

namespace app\tests\unit\entities\employee;

use app\entities\employee\Employee;
use app\entities\employee\EmployeeId;
use app\entities\employee\Name;
use app\entities\employee\Address;
use app\entities\employee\Phone;

class EmployeeBuilder {

	private $id = 1;
	private $phones = [];
	private $archived = false;


	public function __construct() {
		$this->phones[] = new Phone(7, '000', '00000000');
	}

	public static function instance() {
		return new self();
	}

	public function withId($id) {
		$this->id = $id;
		return $this;
	}

	public function withPhones(array $phones) {
		$this->phones = $phones;
		return $this;
	}

	public function archived() {
		$this->archived = true;
		return $this;
	}

	public function build() {
		$employee = new Employee(
			new EmployeeId($this->id),
			new Name('Пупкин', 'Василий', 'Петрович'),
			new Address('Россия', 'Липецкая обл.', 'г. Пушкин', 'ул. Ленина', 25),
			$this->phones
		);

		if($this->archived) {
			$employee->archive(new \DateTimeImmutable());
		}

		return $employee;
	}

}