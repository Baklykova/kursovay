<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="form-reg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?php /* echo $form->field($model, 'zayvitel_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Zayvitel::find()->orderBy('id')->asArray()->all(), 'id', 'fio'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Zayvitel')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);  */?>

    <?php /* echo $form->field($model, 'ispolnitel_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Ispolnitel::find()->orderBy('id')->asArray()->all(), 'id', 'fio'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Ispolnitel')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);*/ ?>
    <?php  echo $form->field($model, 'date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => Yii::t('app', 'Choose Date Add'),
                'autoclose' => true,
            ]
        ],
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
