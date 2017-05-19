<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 18.05.2017
 * Time: 12:57
 */

namespace app\models;

use Yii;

class Zayvitel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'zayvitel';
    }

    public function rules()
    {
        return [
            [['fio'],'required'], //обязательное заполнение
            [['telefon'],'integer'], //целые значения
            [['fio', 'address',], 'string'], //текстовые значения
            [['email'],'safe'], //значения которые принимаются в том виде в котором записываются
            ];
    }
    public function attributeLabels()
    {
        return [
            //'id' => Yii::t('app', 'ID'),
            'fio' => Yii::t('app', 'FIO'),
            'address' => Yii::t('app', 'Address'),
            'telefon' => Yii::t('app', 'Telefon'),
            'email' => Yii::t('app', 'Email'),
        ];
    }
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [

            'fio' => Yii::t('app', 'ФИО заявителя'),
            'address' => Yii::t('app', 'Адрес'),
            'telefon' => Yii::t('app', 'Телефон'),
            'email' => Yii::t('app', 'Адрес эл.почты'),
        ]);
    }

    public function getReg()
    {
        return $this->hasMany(\app\models\Reg::className(), ['zayvitel_id' => 'id']);
    }
    
    public static function find()
    {
        return new \app\models\ZayvitelQuery(get_called_class());
    }
}