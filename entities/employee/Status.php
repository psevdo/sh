<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:36
 */

namespace app\entities\employee;

use Assert\Assertion;

class Status {

	const ACTIVE = 'active';
	const ARCHIVED = 'archived';

	private $value;
	private $date;

	public function __construct($value, \DateTimeImmutable $date) {
		Assertion::inArray($value, [
			self::ACTIVE,
			self::ARCHIVED
		]);

		$this->value = $value;
		$this->date = $date;
	}

	public function isActive() {
		return $this->value === self::ACTIVE;
	}

	public function isArchived() {
		return $this->value === self::ARCHIVED;
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @return \DateTimeImmutable
	 */
	public function getDate() {
		return $this->date;
	}



}