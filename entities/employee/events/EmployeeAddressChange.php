<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 13:19
 */

namespace app\entities\employee\events;


use app\entities\employee\Address;
use app\entities\employee\EmployeeId;

class EmployeeAddressChange {

	public $employeeId;
	public $address;

	public function __construct(EmployeeId $id, Address $address) {
		$this->employeeId = $id;
		$this->address = $address;
	}

}