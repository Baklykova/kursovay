<?php
/**
 * Created by PhpStorm.
 * User: stud04
 * Date: 23.05.2017
 * Time: 11:04
 */

namespace app\models;

use Yii;

/**
 * @property mixed pdfFile
 */
class Ispolnenie extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'ispolnenie_obr';
    }
    public function rules()
    {
        return [
            [['reg_obr_id','date', 'type_vydacha_otveta_id'],'required'], //обязательное заполнение
            [['reg_obr_id','date', 'type_vydacha_otveta_id'],'integer'], //целые значения
            [['rezyltat_otveta', 'otvet',], 'string'], //текстовые значения
            [['date', 'dop_otveta'],'safe'], //значения которые принимаются в том виде в котором записываются
            [['reg_obr_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Reg::className(), 'targetAttribute' => ['reg_obr_id' => 'id']],
            [['type_vydacha_otveta_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\TypeVydachaOtveta::className(), 'targetAttribute' => ['type_vydacha_otveta_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'reg_obr_id' => Yii::t('app', 'Reg ID'),
            'date' => Yii::t('app', 'Date'),
            'rezyltat_otveta' => Yii::t('app', 'Rezyltat'),
            'otvet' => Yii::t('app', 'Otvet'),
            'dop_otveta' => Yii::t('app', 'Dop Otveta'),
            'type_vydacha_otveta_id' => Yii::t('app', 'Type Vydacha Otveta ID'),
        ];
    }

    public function getReg()
    {
        return $this->hasOne(\app\models\Reg::className(), ['id' => 'reg_obr_id']);
    }

    public function getTypeVydachaOtveta()
    {
        return $this->hasOne(\app\models\TypeVydachaOtveta::className(), ['id' => 'type_vydacha_otveta_id']);
    }

    public static function find()
    {
        return new \app\models\IspolnenieQuery(get_called_class());
    }

    public function uploadPdf()
    {
        if ($this->validate()){
            $this->pdfFile->saveAs('pdf/' . $this->pdfFile->baseName . '.' . $this->pdfFile->extension);
            return true;
        } else{
            return false;
        }
    }
}