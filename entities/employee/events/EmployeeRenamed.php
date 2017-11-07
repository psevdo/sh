<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 13:47
 */

namespace app\entities\employee\events;


use app\entities\employee\EmployeeId;
use app\entities\employee\Name;

class EmployeeRenamed {

	public $employeeId;
	public $name;

	public function __construct(EmployeeId $id, Name $name) {
		$this->employeeId = $id;
		$this->name = $name;
	}

}