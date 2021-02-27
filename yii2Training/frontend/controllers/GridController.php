<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\RegistrationForm;
use frontend\models\RegistrationFormSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

class GridController extends Controller
{
	public function actionIndex()
	{
		$model=new RegistrationForm();
		$searchModel = new RegistrationFormSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->get());

		return $this->render('index',[
			'dataProvider'=>$dataProvider,
			'searchModel' => $searchModel,
		]);
	}
}