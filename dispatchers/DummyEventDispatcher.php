<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 12:45
 */

namespace app\dispatchers;

use app\dispatchers\IEventDispatcher;

class DummyEventDispatcher implements IEventDispatcher {

	public function dispatch(array $events) {
		foreach($events as $event) {
			\Yii::info('Dispatch event ' . get_class($event));
		}
	}
}