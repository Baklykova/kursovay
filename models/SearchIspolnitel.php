<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 19.05.2017
 * Time: 15:36
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ispolnitel;

class SearchIspolnitel extends Ispolnitel
{
    public function search($params)
    {
        $query = Ispolnitel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'fio' => $this->fio,
            'dolgnost' => $this->dolgnost,
        ]);

        return $dataProvider;
    }

}