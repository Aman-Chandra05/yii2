<?php
namespace app\modules\revision\controllers;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use app\modules\revision\models\Product;
use app\modules\revision\models\Variant;
use app\modules\revision\models\VariantSearch;
use Yii;


class SiteController extends Controller
{
    public function actionIndex()
    {
    	$model = new VariantSearch();
    	/*echo "<pre>";
    	print_r($model->getAttribute('product_id'));
    	die();*/
/*
    	$data =$model->find()->joinWith(
    		['product'])->all();*/
		$searchModel = new VariantSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->get());

		return $this->render('index',[
			'dataProvider'=>$dataProvider,
			'searchModel' => $searchModel,
		]);
    }
}
