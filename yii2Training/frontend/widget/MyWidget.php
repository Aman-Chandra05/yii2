<?php

namespace frontend\widget;
use yii\base\Widget;
use Yii;

class MyWidget extends Widget
{
	public $labels;
	public $heading;
	public function init()
    {
        parent::init();
        if()

    }

    public function run()
    {	
		echo Yii::getAlias('@ab');
    	$view=$this->getView();
    	/*$view->registerJs("alert('JS Registered')");
    	$view->registerCss("body{background-color:green}");*/
    	$view->registerJsFile('@web/js/myjs.js');
    	$view->registerCssFile('@web/css/mycss.css');
    	/*$view->registerJsFile('@ab/js/jsfile.js');
    	$view->registerCssFile('@ab/css/mycss.css');*/
		$heading=$this->heading;
    	$form="<form>";
    	for($i=0;$i<count($this->labels);$i++)
    	{
    		$form.='<div class="form-group">
			    <label for="exampleInputPassword1">'.$this->labels[$i].'</label>
			    <input type="text" class="form-control">
			  </div>';
    	}
    	$form.='<div>
			  	<button type="submit" class="btn btn-primary">Register</button>
			  </div>
			</form>';

	    return $form;
	    /*$form='<form>
			   <div class="form-group">
			    <label for="exampleInputPassword1">Mobile</label>
			    <input type="number" class="form-control" id="exampleInputPassword1">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <div class="form-group form-check">
			  <label class="form-check-label" for="exampleCheck1">Dob</label>
			    <input type="date" class="form-check-input" id="exampleCheck1">
			  </div>
			  <div>
			  <label class="form-check-label" for="exampleCheck1">Image</label>
			    <input type="file" class="form-check-input" id="exampleCheck1">
			  </div>
			  <div>
			  	<button type="submit" class="btn btn-primary">Register</button>
			  </div>
			</form>';*/
    }
}