<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 12:58
 */

namespace app\repositories;

use app\entities\employee\Employee;
use app\entities\employee\EmployeeId;

interface IEmployeeRepository {

	public function get(EmployeeId $id);

	public function add(Employee $employee);

	public function save(Employee $employee);

	public function remove(Employee $employee);

	public function nextId();

}