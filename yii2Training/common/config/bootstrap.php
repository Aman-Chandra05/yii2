<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@ab', '@frontend/widget');
// Yii::setAlias('@var', '/opt/lampp/htdocs/training/yii2Training/');
Yii::setAlias('@var',dirname(dirname(__DIR__)) . '/var');