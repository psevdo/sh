<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 11.10.2017
 * Time: 15:06
 */

namespace app\modules\sh\entities\hobby;


class Hobby {

	private $_id;
	private $_title;
	private $_sex;
	private $_sort;

	public function __construct($id, $title, $sex, $sort) {
		$this->_id = $id;
		$this->_title = $title;
		$this->_sex = $sex;
		$this->_sort = $sort;
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->_id;
	}

	/**
	 * @return mixed
	 */
	public function getTitle() {
		return $this->_title;
	}

	/**
	 * @return mixed
	 */
	public function getSex() {
		return $this->_sex;
	}

	/**
	 * @return mixed
	 */
	public function getSort() {
		return $this->_sort;
	}


}