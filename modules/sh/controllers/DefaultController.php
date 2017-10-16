<?php

namespace app\modules\sh\controllers;

use yii\web\Controller;

/**
 * Default controller for the `sh` module
 */
class DefaultController extends Controller {
	/**
	 * Renders the index view for the module
	 * @return string
	 */
	public function actionIndex() {
		return $this->render('index');
	}

	public function actionTest() {
		$hobby = new \app\modules\sh\entities\hobby\Hobby(
			5,
			'ttt',
			'male',
			3
		);

		echo '<pre>';
		print_r($hobby);
		echo '</pre>';
	}
}
