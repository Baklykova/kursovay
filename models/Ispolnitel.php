<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 19.05.2017
 * Time: 15:25
 */

namespace app\models;
use Yii;

class Ispolnitel extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'ispolnitel';
    }

    public function rules()
    {
        return [
            [['fio'],'required'], //обязательное заполнение
            [['fio', 'dolgnost',], 'string'], //текстовые значения
        ];
    }
    public function attributeLabels()
    {
        return [
            'fio' => Yii::t('app', 'ФИО'),
            'dolgnost' => Yii::t('app', 'Долность'),
        ];
    }
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [

            'fio' => Yii::t('app', 'ФИО заявителя'),
            'dolgnost' => Yii::t('app', 'Дожность'),           
        ]);
    }
    public function getReg()
    {
        return $this->hasMany(\app\models\Reg::className(), ['ispolnitel_id' => 'id']);
    }

    public static function find()
    {
        return new \app\models\IspolnitelQuery(get_called_class());
    }
    
}