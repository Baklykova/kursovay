<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 18.05.2017
 * Time: 15:59
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zayvitel;

class SearchZayvitel extends Zayvitel
{
    public function rules()
    {
        return[
            [['telefon'],'integer'],
           // [['email'],'safe'],
        ];
    }
    public function search($params)
    {
        $query = Zayvitel::find();
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
            'fio' => $this->fio,
            'address' => $this->address,
            'telefon' => $this->telefon,
           // 'email' => $this->email,
        ]);
        /* $query->andFilterWhere(['like', 'f', $this->f])
             ->andFilterWhere(['like', 'i', $this->i])
             ->andFilterWhere(['like', 'o', $this->o])
             ->andFilterWhere(['like', 'description', $this->description]);*/

        return $dataProvider;
    }
}