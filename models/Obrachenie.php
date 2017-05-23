<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 21.05.2017
 * Time: 19:21
 */

namespace app\models;

use Yii;


/**
 * @property UploadedFile imegeFiles
 */
class Obrachenie extends \yii\db\ActiveRecord
{
    public $imageFiles;
    public static function tableName()
    {
     return 'obrachenie';
    }

    public function rules()
    {
        return [
            [['krat_obr','vid_obr_id'],'required'],
            [['vid_obr_id'],'integer'],
            [['krat_obr','dop_sved'],'string'],
            [['primechanie'],'safe'],
            [['vid_obr_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\VidObr::className(), 'targetAttribute' => ['vid_obr_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'krat_obr'=> Yii::t('app', 'Krat Obr'),
            'dop_sved'=> Yii::t('app', 'Dop Sved'),
            'primechanie'=> Yii::t('app', 'Primechanie'),
            'vid_obr_id'=> Yii::t('app', 'Vid Obr ID'),
        ];
    }

    public function getVidObr(){
        return $this->hasOne(\app\models\VidObr::className (), ['id' => 'vid_obr_id']);
    }
    public function getReg(){
        return $this->hasOne(\app\models\Reg::className (), ['obrachenie_id' => 'id']);
    }
    public static function find()
    {
        return new \app\models\ObrachenieQuery(get_called_class());
    }
    
    public function uploadImage()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $file->saveAs('image/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}