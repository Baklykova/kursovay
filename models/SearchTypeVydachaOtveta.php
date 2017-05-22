<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 22.05.2017
 * Time: 9:59
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TypeVydachaOtveta;
class SearchTypeVydachaOtveta extends TypeVydachaOtveta
{
    public function rules()
    {
        return[
            [['name'],'integer'],
        ];
    }
    public function search($params)
    {
        $query = TypeVydachaOtveta::find();
      
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
           return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,        
        ]);
       
        return $dataProvider;
    }
}