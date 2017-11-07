<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 04.11.2017
 * Time: 12:32
 */

namespace app\entities\employee;

use Assert\Assertion;

class Address {

	private $country;
	private $region;
	private $city;
	private $street;
	private $house;

	public function __construct($country, $region, $city, $street, $house) {
		Assertion::notEmpty($country);
		Assertion::notEmpty($city);

		$this->country = $country;
		$this->region = $region;
		$this->city = $city;
		$this->street = $street;
		$this->house = $house;
	}

	/**
	 * @return mixed
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @return mixed
	 */
	public function getRegion() {
		return $this->region;
	}

	/**
	 * @return mixed
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @return mixed
	 */
	public function getStreet() {
		return $this->street;
	}

	/**
	 * @return mixed
	 */
	public function getHouse() {
		return $this->house;
	}



}