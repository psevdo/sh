<?php
/**
 * Created by PhpStorm.
 * User: Psevdo
 * Date: 06.11.2017
 * Time: 12:48
 */

namespace app\controllers;

use yii\web\Controller;
use app\forms\EmployeeCreateForm;
use app\services\EmployeeService;
use Yii;

class EmployeeController extends Controller {

	private $employeeService;

	public function __construct($id, Module $module, EmployeeService $employeeService, array $config = []) {
		$this->employeeService = $employeeService;
		parent::__construct($id, $module, $config);
	}

	public function actionCreate() {
		$form = new EmployeeCreateForm();

		if($form->load(Yii::$app->request->post()) && $form->validate()) {
			try {
				$this->employeeService->create($form->getDto());
				Yii::$app->session->setFlash('success', 'Employee is created.');
				return $this->redirect(['index']);
			} catch(\DomainException $e) {
				Yii::$app->errorHandler->logException($e);
				Yii::$app->session->setFlash('error', Yii::t('errors', $e->getMessage()));
			}
		}

		return $this->render('create', [
			'form' => $form
		]);
	}

}