<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 23.05.2017
 * Time: 13:02
 */

namespace app\models;


class SearchIspolnenie extends Ispolnenie
{

    public function rules()
    {
        return [
            [['reg_obr_id', 'date', 'type_vydacha_otveta_id'], 'integer'],
            [['date', 'dop_otveta'], 'safe'],
        ];
    }
    public function search($params)
    {
        $query = Ispolnenie::find();
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
            'reg_obr_id' => $this->reg_obr_id,
            'date' => $this->date,
            'rezyltat_otveta' => $this->rezyltat_otveta,
            'otvet' => $this->otvet,
            'dop_otveta' => $this->dop_otveta,
            'type_vydacha_otveta_id' => $this->type_vydacha_otveta_id,
        ]);

        return $dataProvider;
    }
}