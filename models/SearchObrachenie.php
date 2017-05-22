<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 22.05.2017
 * Time: 18:54
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Obrachenie;

class SearchObrachenie extends Obrachenie
{

    public function rules()
    {
        return [
            [['vid_obr_id'], 'integer'],
            [['primechanie'], 'safe'],
        ];
    }


    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Obrachenie::find();
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
            'krat_obr' => $this->krat_obr,
            'dop_sved' => $this->dop_sved,
            'primechanie' => $this->primechanie,
            'vid_obr_id' => $this->vid_obr_id,
        ]);

        return $dataProvider;
    }
}
