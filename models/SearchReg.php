<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 10.05.2017
 * Time: 16:23
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reg;

class SearchReg extends Reg
{

        public function rules()
    {
        return[
            [['reg_num','zayvitel_id','ispolnitel_id', 'date', 'vid_obr_id'],'integer'],
            [['date', 'primechanie'],'safe'],
        ];
    }


    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Reg::find();
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
            'vid_obr_id' => $this->vid_obr_id,
            'zayvitel_id' => $this->zayvitel_id,
            'ispolnitel_id' => $this->ispolnitel_id,
            'kyda' => $this->kyda,
            'date' => $this->date,
        ]);
       /* $query->andFilterWhere(['like', 'f', $this->f])
            ->andFilterWhere(['like', 'i', $this->i])
            ->andFilterWhere(['like', 'o', $this->o])
            ->andFilterWhere(['like', 'description', $this->description]);*/

        return $dataProvider;
    }
}