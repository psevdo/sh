<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 13:28
 */

namespace tests\unit\repositories;

use app\repositories\MemoryEmployeeRepository;

class MemoryEmployeeRepositoryTest extends BaseRepositoryTest {

	public function _before() {
		$this->repository = new MemoryEmployeeRepository();
	}

}