<?php
use yii\helpers\Html;
use frontend\widget\MyWidget;

?>

<?php $form=MyWidget::begin(['labels'=>['Name','Email','Password',],'heading'=>'Signup']); ?>
	
	<h1><?=$form->heading ?></h1>
<?php MyWidget::end(); ?>