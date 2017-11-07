<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 07.11.2017
 * Time: 12:50
 */

namespace tests\_fixtures;

use yii\test\ActiveFixture;

class EmployeeStatusFixture extends ActiveFixture {
	public $tableName = '{{%sql_employees}}';
	public $dataFile = '@tests/_fixtures/data/employees.php';
}