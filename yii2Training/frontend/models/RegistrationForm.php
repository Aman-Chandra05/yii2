<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class RegistrationForm extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%register}}';
    }

    public function rules()
    {  return [  
            ['name', 'match', 'pattern' => '/^[A-Za-z ]*$/i'],
            [['image'], 'file', 'extensions' => 'png, jpg,jpeg'],
            ['dob','required'],
            ['name','required','message'=>'Mandatory'],
            ['name','trim'],
            ['mobile','required'],
            ['mobile','number'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string',],
            ['password', 'required'],
            ['password', 'string',],
            ['password', 'match', 'pattern' => '/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,16}$/','message'=>'Password should containat least 8 characters with 1 block char, 1 special char and 1 number']
    ];
    }
}
?>