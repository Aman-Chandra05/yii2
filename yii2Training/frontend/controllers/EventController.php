<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\base\Event;
use Yii;
/**
 * 
 */
class EventController extends Controller
{
	const EVENT_HELLO = 'hello';
	public function actionIndex()
	{
		echo "<br><br><br><br>";

		echo Yii::getAlias('@app');
		$this->on(self::EVENT_HELLO,function($event){
			echo "<pre>";
			print_r($event->data);
			echo "</pre>";
		},["RDJ","CAP"]
		);
		// $this->on(self::EVENT_HELLO,[$this,'check'],"CED",false);
        $this->trigger(self::EVENT_HELLO);
        //return $this->render('index');
	}

	/*function check($event){
		echo "$event->data";
	}*/


}