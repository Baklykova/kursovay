<?php
/**
 * Created by PhpStorm.
 * User: stud02
 * Date: 05.05.2017
 * Time: 13:07
 */
namespace app\models;

use Yii;

class Reg extends \yii\db\ActiveRecord
{
   public static function tableName()
    {
        return 'reg_obr';
    }
    
    public function rules()
    {
        return [
            [['reg_num','zayvitel_id','ispolnitel_id', 'vid_obr_id'],'required'], //обязательное заполнение
            [['reg_num','zayvitel_id','ispolnitel_id', 'date', 'vid_obr_id'],'integer'], //целые значения
            [['kyda', 'obrachenie'], 'string'], //текстовые значения
            [['date', 'primechanie'],'safe'], //значения которые принимаются в том виде в котором записываются
            [['zayvitel_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Zayvitel::className(), 'targetAttribute' => ['zayvitel_id' => 'id']],
            [['ispolnitel_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Ispolnitel::className(), 'targetAttribute' => ['ispolnitel_id' => 'id']],
            [['vid_obr_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\VidObr::className(), 'targetAttribute' => ['vid_obr_id' => 'id']],

        ];
    }

    public function attributeLabels()
    {
        return [
            //'id' => Yii::t('app', 'ID'),
            'reg_num' => Yii::t('app', 'Reg Nun'),
            'vid_obr_id' => Yii::t('app', 'Vid Obr ID'),
            'zayvitel_id' => Yii::t('app', 'Zayvitel ID'),
            'ispolnitel_id' => Yii::t('app', 'Ispolnitel ID'),
            'kyda' => Yii::t('app', 'Kyda'),
            'date' => Yii::t('app', 'Date'),
            'obrachenie' => Yii::t('app', 'Obrachenie'),
            'primechanie' => Yii::t('app', 'Primechanie'),
          
        ];
    }

    public function getZayvitel()
    {
        return $this->hasOne(\app\models\Zayvitel::className(), ['id' => 'zayvitel_id']);
    }

    public function getIspolnitel()
    {
        return $this->hasOne(\app\models\Ispolnitel::className(), ['id' => 'ispolnitel_id']);
    }


    public function getVidObr()
    {
        return $this->hasOne(\app\models\VidObr::className(), ['id' => 'vid_obr_id']);
    }

   /* public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date_add',
                'updatedAtAttribute' => 'date_edit',
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }*/

    public static function find()
    {
        return new \app\models\RegQuery(get_called_class());
    }
    /*public function validateUniqueRegNum(){
        $model = \app\models\Reg::find();
        //Устанавливаем фильтр для проверки существования рег.номера
        $model->andFilterWhere([
            'reg_num'=>$this->reg_num,
            'vid_obr_id' => $this->vid_obr_id
        ]);
        if ($model->count() > 0){
            $this->addError('reg_num','Рег.номер "'. $this->reg_num .'" уже существует для данного типа обращения.');
        }
    }*/
}