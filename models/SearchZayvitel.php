<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 18.05.2017
 * Time: 15:59
 */

namespace app\models;


class SearchZayvitel
{
    public function rules()
    {
        return[
            [['zayvitel_id','ispolnitel_id', 'date', 'obrachenie_id'],'integer'],
            [['date'],'safe'],
        ];
    }
}