<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 21.05.2017
 * Time: 18:47
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zayvitel;

class SearchVidObr extends VidObr
{
    public function rules()
    {
        return[
            [['name'],'integer'],
        ];
    }
    public function search($params)
    {
        $query = VidObr::find();
        /*if (!Yii::$app->getUser()->can('admins')){ // проверка прав пользователя
            $query->andFilterWhere(['user_id' => Yii::$app->getUser()->id]);
        }*/

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'name' => $this->name,
        ]);

        return $dataProvider;
    }
}