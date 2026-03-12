<?php

namespace app\controllers;

use Yii;
use app\models\Registration;
use app\models\User;
use app\models\Course;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        // Create an ActiveDataProvider for the Registration model
        $dataProvider = new ActiveDataProvider([
            'query' => Registration::find()->with('student', 'course'),
        ]);

        // Render the 'index' view with the data provider
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Registration();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $user = User::find()->all();
        $course = Course::find()->all();

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
            'course' => $course,
        ]);
    }
}
