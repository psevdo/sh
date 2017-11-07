<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 13:11
 */

namespace app\entities\employee\events;


use app\entities\employee\EmployeeId;

class EmployeeArchived {

	public $employeeId;
	public $date;

	public function __construct(EmployeeId $id, \DateTimeImmutable $date) {
		$this->employeeId = $date;
		$this->date = $date;
	}

}