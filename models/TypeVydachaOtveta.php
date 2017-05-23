<?php
/**
 * Created by PhpStorm.
 * User: stud05
 * Date: 22.05.2017
 * Time: 9:47
 */

namespace app\models;

use Yii;
class TypeVydachaOtveta extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'type_vydacha_otveta';
    }
    public function rules()
    {
        return [
            [['name'],'required'], //обязательное заполнение
            [['name'], 'string'], //текстовые значения
        ];
    }
    public function attributeLabels()
    {
        return [
            //'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Тип выдачи ответа'),
        ];
    }
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [

            'name' => Yii::t('app', 'Тип выдачи ответа'),
        ]);
    }
    public function getIspolnenie()
    {
        return $this->hasMany(\app\models\Ispolnenie::className(), ['type_vydacha_otveta_id' => 'id']);
    }

    public static function find()
    {
        return new \app\models\TypeVydachaOtvetaQuery(get_called_class());
    }

}