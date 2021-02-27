<?php
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use yii\caching\Cache;


class CacheController extends Controller
{
    public function actionIndex()
    {
        
        return $this->render('index');
    }

    public function actionRefresh()
    {
        Yii::$app->Cache->flush();
        return $this->redirect('index');
    }
}

?>