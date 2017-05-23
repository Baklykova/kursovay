<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 21.05.2017
 * Time: 18:46
 */

namespace app\models;

use Yii;
class VidObr extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'vid_obr';
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
            'name' => Yii::t('app', 'Вид обращения'),
        ];
    }
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [

            'name' => Yii::t('app', 'Вид обращения'),
        ]);
    }

    public function getObrachenie()
    {
        return $this->hasMany(\app\models\Obrachenie::className(), ['vid_obr_id' => 'id']);
    }
    public function getReg()
    {
        return $this->hasMany(\app\models\Reg::className(), ['vid_obr_id' => 'id']);
    }

    public static function find()
    {
        return new \app\models\VidObrQuery(get_called_class());
    }

}