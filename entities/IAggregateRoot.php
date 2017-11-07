<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 03.11.2017
 * Time: 12:26
 */

namespace app\entities;


interface IAggregateRoot {

	public function getId();
	public function releaseEvents();
}