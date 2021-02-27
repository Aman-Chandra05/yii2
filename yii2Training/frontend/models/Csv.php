<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class Csv extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%csv}}';
    }
    public $csv;
    public $name;
    public $email;
    public function rules()
    {  return [

            ['csv','required','message'=>'Mandatory'],
            [['csv'], 'file', 'extensions' => 'csv'],
    ];
    }
}
?>