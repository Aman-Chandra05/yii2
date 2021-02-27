<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * 
 */
class MycontrollerController extends Controller
{
	
	public function actionIndex()
    {
    	
        return $this->render('index');
    }

    public function actionNews()
    {
    	//echo $a;
    	return $this->render('news');
    }

    public function actionContact()
    {
    	return $this->render('contact');
    }

    public function actionAbout()
    {
    	
    	return $this->render('about');
    }
}