<?php

namespace frontend\controllers;
use yii\web\Controller;
use Yii;

class CurlController extends Controller
{	

    public function actionCurl()
    {
        //$url=Yii::getAlias('@frontend/views/curl/index.php');
        $url='http://localhost/training/yii2Training/frontend/web/dummy.php';
        $data=array(
            'Name'=>"Aman",
            'Email'=>'amanchandra@gmail.com'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        echo "hey ".$result;
    }
    public function actionIndex()
    {
        echo "aman";
        //return $this->render('index');
    }
}
//$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $url); //curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); curl_setopt($ch, CURLOPT_POST,true); curl_exec($ch); //curl_setopt($ch, CURLOPT_POSTFIELDS,$data); //$result=curl_exec($ch); //if($result===true) //echo $result;