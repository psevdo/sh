<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 07.11.2017
 * Time: 12:33
 */

namespace tests\unit\repositories;


use app\repositories\Hydrator;
use app\repositories\SqlEmployeeRepository;
use tests\_fixtures\EmployeeFixture;
use tests\_fixtures\EmployeePhoneFixture;
use tests\_fixtures\EmployeeStatusFixture;

class SqlEmployeeRepositoryTest extends BaseRepositoryTest {

	public $tester;

	public function _before() {
		$this->tester->haveFixtures([
			'employee' => EmployeeFixture::className(),
			'phone' => EmployeePhoneFixture::className(),
			'status' => EmployeeStatusFixture::className(),
		]);
		$this->repository = new SqlEmployeeRepository(\Yii::$app->db, new Hydrator());
	}

}