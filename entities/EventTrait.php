<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 03.11.2017
 * Time: 12:28
 */

namespace app\entities;

trait EventTrait {

	private $events = [];

	protected function recordEvent($event) {
		$this->events[] = $event;
	}

	public function releaseEvents() {
		$events = $this->events;
		$this->events = [];
		return $events;
	}

}