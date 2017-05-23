<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 04.05.2017
 * Time: 18:58
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="reg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'reg_num')->textInput() ?>
    
    <?= $form->field($model, 'vid_obr_id')->widget(\kartik\widgets\Select2::classname(), [
        //'data' => \yii\helpers\ArrayHelper::map(\app\models\VidObr::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'zayvitel_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Zayvitel::find()->orderBy('id')->asArray()->all(), 'id', 'fio'),
        'options' => ['placeholder' => Yii::t('app', 'Choose')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'ispolnitel_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Ispolnitel::find()->orderBy('id')->asArray()->all(), 'id', 'fio'),
        'options' => ['placeholder' => Yii::t('app', 'Choose')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    
    <?= $form->field($model, 'kyda')->textInput(['maxlength' => false, ]) ?>

    <?= $form->field($model, 'date')->widget(\kartik\date\DatePicker::classname(), [
        'value' => date('Y-m-d'),
        'convertFormat' => true,
        'pluginOptions' => [
            'placeholder' => Yii::t('app', 'Choose'),
            'autoclose' => true,
            'format' => 'php:Y-m-d',
            'todayHighlight' => true,
            'todayBtn' => true,
        ]
    ]) ?>
    <?= $form->field($model, 'obrachenie')->textarea(['rows' => 2, 'cols' => 5]) ?>
    
    <?= $form->field($model, 'primechanie')->fileInput() ?>


    <div class="form-group">
        <?php if(Yii::$app->controller->action->id != 'save-as-new'): ?>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php endif; ?>
        <?php if(Yii::$app->controller->action->id != 'create'): ?>
            <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
        <?php endif; ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

