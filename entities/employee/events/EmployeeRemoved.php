<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 13:45
 */

namespace app\entities\employee\events;


use app\entities\employee\EmployeeId;

class EmployeeRemoved {

	public $employeeId;

	public function __construct(EmployeeId $id) {
		$this->employeeId = $id;
	}

}