<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:23
 */

namespace app\entities;

use Assert\Assertion;

abstract class Id {

	protected $id;

	public function __construct($id = null) {
		Assertion::notEmpty($id);
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function isEqualTo(self $other) {
		return $this->getId() === $other->getId();
	}
}