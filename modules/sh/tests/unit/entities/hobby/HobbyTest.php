<?php

namespace app\modules\sh\tests\unit\entities\hobby;

use app\modules\sh\entities\hobby\Hobby;
use app\modules\sh\entities\hobby\HobbyId;
use app\modules\sh\entities\hobby\HobbySex;
use Codeception\Test\Unit;

class HobbyTest extends Unit {
	/**
	 * @var \UnitTester
	 */
	protected $tester;

	protected $id = 5;
	protected $title = 'test';
	protected $sex = 'male';
	protected $sort = 1;

	protected function _before() {
	}

	protected function _after() {
	}

	public function buildHobby() {
		return new \app\modules\sh\entities\hobby\Hobby(
			$this->id,
			$this->title,
			$this->sex,
			$this->sort
		);
	}

	// tests
	public function testCreate() {
		// $hobby = $this->buildHobby();
		$hobby = new \app\modules\sh\entities\hobby\Hobby(
			$this->id,
			$this->title,
			$this->sex,
			$this->sort
		);

		$this->assertEquals($this->id, $hobby->getId());
		$this->assertEquals($this->title, $hobby->getTitle());
		$this->assertEquals($this->sex, $hobby->getSex());
		$this->assertEquals($this->sort, $hobby->getSort());

	}

	// public function testEdit() {
	// 	$hobby = $this->buildHobby();
	// 	$hobby->title = 'new title';
	// 	$hobby->sex = HobbySex::SEX_FEMALE;
	// 	$hobby->sort = 5;
	//
	// 	$this->assertEquals('new title', $hobby->getTitle());
	// 	$this->assertEquals(HobbySex::SEX_FEMALE, $hobby->getSex());
	// 	$this->assertEquals(5, $hobby->getSort());
	// }
	//
	// public function testRemove() {
	//
	// }

}