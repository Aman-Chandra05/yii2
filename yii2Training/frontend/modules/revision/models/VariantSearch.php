<?php
namespace app\modules\revision\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\modules\revision\models\Variant;
use yii\data\ActiveDataProvider;

/**
 * 
 */
class VariantSearch extends Variant
{
    public function rules()
    {  return [  
            ['product_id','trim'],
            ['variant_id','trim'],
            ['price', 'trim'],
            ['inventory', 'trim'],
            ['product.DisplayTitle','trim']
        ];
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),['product.DisplayTitle']);
    }

    public function search($params)
    {
        $query = VariantSearch::find()->joinWith('product');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['product_id' => $this->product_id]);
        $query->andFilterWhere(['like', 'product.title', $this->getAttribute('product.DisplayTitle')])
              ->andFilterWhere(['=', 'variant_id', $this->variant_id])
              ->andFilterWhere(['like', 'price', $this->price])
              ->andFilterWhere(['like', 'inventory', $this->inventory]);
        return $dataProvider;
    }

}