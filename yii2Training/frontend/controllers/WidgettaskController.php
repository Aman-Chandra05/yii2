<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\RegistrationForm;
/**
 * 
 */
class WidgettaskController extends Controller
{
    public function actionIndex()
    {
        $model = new RegistrationForm();
        $data =$model->find()->all();
        return $this->render('index', [
            'cont'=>$data
        ]);
    }

    public function actionWidgetform()
    {

        return $this->render('widgetform');
    }
}