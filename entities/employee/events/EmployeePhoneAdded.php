<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:52
 */

namespace app\entities\employee\events;


use app\entities\employee\EmployeeId;
use app\entities\employee\Phone;

class EmployeePhoneAdded {

	public $employeeId;
	public $phone;

	public function __construct(EmployeeId $id, Phone $phone) {
		$this->employeeId = $id;
		$this->phone = $phone;
	}

}