<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:28
 */

namespace app\entities\employee;

use Assert\Assertion;

class Name {

	private $last;
	private $first;
	private $middle;

	public function __construct($last, $first, $middle) {
		Assertion::notEmpty($last);
		Assertion::notEmpty($first);

		$this->last = $last;
		$this->first = $first;
		$this->middle = $middle;
	}

	public function getFull() {
		return trim($this->last . ' ' . $this->first . ' ' . $this->middle);
	}

	/**
	 * @return mixed
	 */
	public function getLast() {
		return $this->last;
	}

	/**
	 * @return mixed
	 */
	public function getFirst() {
		return $this->first;
	}

	/**
	 * @return mixed
	 */
	public function getMiddle() {
		return $this->middle;
	}



}