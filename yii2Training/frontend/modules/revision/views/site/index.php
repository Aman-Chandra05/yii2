<?php
use yii\grid\GridView;

echo GridView::widget([
		    'dataProvider' => $dataProvider,
		    'filterModel' => $searchModel,
		     'columns' => [
		     	[
		            'class' => 'yii\grid\CheckboxColumn',
		        ],
		        'product_id',
		        [
		        	'attribute'=>'product.DisplayTitle',
		        	'format'=>'text',
		        	'label'=>'Title'
		        ],
		         'variant_id',
		         'price',
    			'inventory'
		    ]
		]);


echo "<pre>";
print_r($dataProvider);
?>
?>