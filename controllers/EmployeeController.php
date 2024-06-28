<?php

namespace app\controllers;

use Yii;
use yii\db\Exception;
use app\models\Employee;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

/**
 * Class EmployeeController
 *
 * @package app\controllers
 */
class EmployeeController extends Controller
{
    public function actionIndex(): array
    {
        return Employee::find()->all();
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): Employee
    {
        return $this->getEmployee($id);
    }

    /**
     * @throws Exception
     */
    public function actionCreate(): Employee
    {
        $employee = new Employee();

        if ($employee->load(Yii::$app->request->post(), '') && $employee->save()) {
            Yii::$app->response->statusCode = 201;
        }

        return $employee;
    }

    /**
     * @throws NotFoundHttpException
     * @throws Exception
     */
    public function actionUpdate(int $id): Employee
    {
        $employee = $this->getEmployee($id);

        if ($employee->load(Yii::$app->request->post(), '') && $employee->save()) {
            Yii::$app->response->statusCode = 201;
        }

        return $employee;
    }

    /**
     * @param int $id
     * @return void
     * @throws NotFoundHttpException
     * @throws ServerErrorHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete(int $id)
    {
        $employee = $this->getEmployee($id);

        if ($employee->delete() === false) {
            throw new ServerErrorHttpException('Error.');
        }

        Yii::$app->response->statusCode = 204;
    }

    /**
     * @throws NotFoundHttpException
     */
    private function getEmployee(int $id): Employee
    {
        $employee = Employee::findOne($id);
        if (!$employee) {
            throw new NotFoundHttpException('Employee not found.');
        }

        return $employee;
    }
}