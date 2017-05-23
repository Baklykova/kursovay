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

<div class="ispolnenie-form">

    <?php $form = ActiveForm::begin(['id' => 'blog-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>
    <?= $form->field($model, 'reg_obr_id')->widget(\kartik\widgets\Select2::classname(),
        [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\Reg::find()->orderBy('id')->asArray()->all(), 'id', 'reg_num'),
            'options' => ['placeholder' => Yii::t('app', 'Choose')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
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
    <?= $form->field($model, 'rezyltat_otveta')->textInput(['maxlength' => false, ]) ?>
    <?= $form->field($model, 'otvet')->textarea(['rows' => 2, 'cols' => 5]) ?>
    <?= $form->field($model, 'dop_otveta')->fileInput() ?>

    <?= $form->field($model, 'type_vydacha_otveta_id')->widget(\kartik\widgets\Select2::classname(),
        [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\TypeVydachaOtveta::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => Yii::t('app', 'Choose')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
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