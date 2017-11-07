<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 13:37
 */

namespace app\entities\employee\events;


use app\entities\employee\EmployeeId;
use app\entities\employee\Phone;

class EmployeePhoneRemoved {

	public $employeeId;
	public $phone;

	public function __construct(EmployeeId $id, Phone $phone) {
		$this->employeeId = $id;
		$this->phone = $phone;
	}

}