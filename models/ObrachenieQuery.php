<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 22.05.2017
 * Time: 18:27
 */

namespace app\models;


class ObrachenieQuery extends \yii\db\ActiveQuery
{


    public function all($db = null)
    {
        return parent::all($db);
    }


    public function one($db = null)
    {
        return parent::one($db);
    }
}