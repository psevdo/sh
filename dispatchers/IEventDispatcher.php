<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 12:43
 */

namespace app\dispatchers;

interface IEventDispatcher {

	public function dispatch(array $events);

}