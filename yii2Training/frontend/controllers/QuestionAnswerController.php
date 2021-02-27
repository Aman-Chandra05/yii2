<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * 
 */

class QuestionAnswerController extends Controller
{
    public function actionIndex()
    {
        //$this->layout='mj';
        return $this->render('index');
    }

    public function actionResult()
    {
        return $this->render('result');
    }

    public function actionInfo()
    {
        return $this->render('info');
    }

    public function actionReviews()
    {
        return $this->render('reviews');
    }


}