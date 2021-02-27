<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<div class="row">
    <div class="col-lg-5">
       <?php  $form = ActiveForm::begin(['action'=>'/training/yii2Training/frontend/web/csv/import','id' => 'import'],['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'csv')->fileInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Import', ['class' => 'btn btn-primary', 'name' => 'import']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<div class="row">
	<div class="col-lg-5">
        <div class="form-group">
            <a href='export?name=export.csv' class='btn btn-primary'>Export</a>
        </div>
	</div>
</div>

