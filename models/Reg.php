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
            [['reg-num','zayvitel_id','ispolnitel_id','obrachenie_id'],'required'], //обязательное заполнение
            [['reg-num','zayvitel_id','ispolnitel_id', 'date', 'obrachenie_id'],'integer'], //целые значения
            [['tema_obr'], 'string'], //текстовые значения
            [['date'],'safe'], //значения которые принимаются в том виде в котором записываются
            [['zayvitel_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Zayvitel::className(), 'targetAttribute' => ['zayvitel_id' => 'id']],
            [['ispolnitel_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Ispolnitel::className(), 'targetAttribute' => ['ispolnitel_id' => 'id']],
            [['obrachenie_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Obrachenie::className(), 'targetAttribute' => ['obrachenie_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            //'id' => Yii::t('app', 'ID'),
            'reg-num' => Yii::t('app', 'Reg Nun'),
            'zayvitel_id' => Yii::t('app', 'Zayvitel ID'),
            'ispolnitel_id' => Yii::t('app', 'Ispolnitel ID'),
            'tema_obr' => Yii::t('app', 'Tema Obr'),
            'date' => Yii::t('app', 'Date'),
            'obrachenie_id' => Yii::t('app', 'Obrachenie ID'),
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

    public function getObrachenie()
    {
        return $this->hasOne(\app\models\Obrachenie::className(), ['id' => 'obrachenie_id']);
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
   /* public function validateUniqueRegNum(){
        $model = \app\models\Reg::find();
        /*Устанавливаем фильтр для проверки существования рег.номера*/
        /*$model->andFilterWhere([
            'reg-num'=>$this->reg-num,
            'vid_obr_id' => $this->obrachenie_id
        ]);
        if ($model->count() > 0){
            $this->addError('reg-num','Рег.номер "'. $this->reg-num .'" уже существует для данного типа обращения.');
        }
    }*/
}