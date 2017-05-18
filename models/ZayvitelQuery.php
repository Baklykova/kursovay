<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 18.05.2017
 * Time: 15:55
 */

namespace app\models;


class ZayvitelQuery extends \yii\db\ActiveQuery
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