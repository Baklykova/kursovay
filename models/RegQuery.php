<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 14.05.2017
 * Time: 16:33
 */

namespace app\models;


class RegQuery extends \yii\db\ActiveQuery
{
    /*public function active()
      {
          $this->andWhere('[[status]]=1');
          return $this;
      }*/

    /**
     * @inheritdoc
     * @return Journal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Journal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}