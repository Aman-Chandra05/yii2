<?php

namespace frontend\widget;
use yii\base\Widget;

class SecondWidget extends Widget
{
	public $content=[];
	public function init()
    {
        parent::init();
    }

    public function run()
    {
	    	/*return $this->render('register',[
	    		'data'=>$this->content
	    	]);*/

	     	return $this->render('/register/index',[
	    		'data'=>$this->content
	    	]);
    }
}