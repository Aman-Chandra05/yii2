<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use frontend\models\RegistrationForm;
use yii\data\ActiveDataProvider;

/**
 * 
 */
class RegistrationFormSearch extends RegistrationForm
{
	public function rules()
    {  return [  
            ['name', 'match', 'pattern' => '/^[A-Za-z ]*$/i'],
            [['image'], 'file', 'extensions' => 'png, jpg,jpeg'],
            ['name','trim'],
            ['dob','trim'],
            ['password','trim'],
            ['mobile','number'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string',],
            ['password', 'string',],
            ['password', 'match', 'pattern' => '/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,16}$/','message'=>'Password should containat least 8 characters with 1 block char, 1 special char and 1 number']
    ];
    }

    public function search($params)
    {
        $query = RegistrationForm::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
    
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['=', 'name', $this->name])
              ->andFilterWhere(['like', 'email', $this->email])
              ->andFilterWhere(['like', 'image', $this->image])
              ->andFilterWhere(['like', 'dob', $this->dob])
              ->andFilterWhere(['like', 'password', $this->password])
              ->andFilterWhere(['like', 'mobile', $this->mobile]);
        return $dataProvider;
    }

}