<?php
use yii\grid\GridView;

echo GridView::widget([
		    'dataProvider' => $dataProvider,
		    'filterModel' => $searchModel,
		     'columns' => [
		        'id',
		        'name','dob','mobile','email','password',
		        [
		        	'attribute'=>'image',
		        	'label'=>'Photo',
		        	'format'=>'raw',
		        	'filter'=>false,
		        	'value'=>function($data){
    					$path=Yii::getAlias('@web').'/uploads/'.$data->image;
    					$value="<img src='".$path."' height='50px'>";
		        		return $value;
		        	}
		        ],
		    ]
		]);
?>