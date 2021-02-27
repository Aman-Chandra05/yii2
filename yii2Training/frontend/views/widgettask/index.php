<?php
use yii\helpers\Html;
use frontend\widget\SecondWidget;


$this->registerJsFile(
    '@web/js/myjs.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<?php
echo SecondWidget::widget(['content'=>$cont]);
?>
