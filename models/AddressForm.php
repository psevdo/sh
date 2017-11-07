<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 12:37
 */

namespace app\models;


use app\services\dto\AddressDto;
use yii\base\Model;

class AddressForm extends Model {

	public $country;
	public $region;
	public $city;
	public $street;
	public $house;

	public function rules() {
		return [];
	}

	public function getDto() {
		$dto = new AddressDto();
		$dto->country = $this->country;
		$dto->region = $this->region;
		$dto->city = $this->city;
		$dto->street = $this->street;
		$dto->house = $this->house;
	}

}