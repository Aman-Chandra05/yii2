<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;
if(isset($model))
{
    $info=$model;
}
elseif(isset($data))
{
    $info=$data;
}
$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
       <?php  $form = ActiveForm::begin(['id' => 'form-register'],['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($info, 'name')->textInput(['type' => 'text']) ?>
            <?= $form->field($info, 'mobile')->textInput(['type' => 'number']) ?>

            <?= $form->field($info, 'email') ?>
            <?= $form->field($info, 'dob')->widget(\yii\jui\DatePicker::classname(), [
             //'language' => 'ru',
             'dateFormat' => 'yyyy-MM-dd',
            ]) ?>

            <?php if(!isset($info['password'])){?>
            <?= $form->field($info, 'password')->passwordInput(); }?>
            <?= $form->field($info, 'image')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary', 'name' => 'register']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>