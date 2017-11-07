<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:50
 */

namespace app\entities\employee\events;

use app\entities\employee\EmployeeId;

class EmployeeCreated {

	public $employeeId;

	public function __construct(EmployeeId $id) {
		$this->employeeId = $id;
	}

}