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

<div class="obrachenie-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<?= $form->field($model, 'krat_obr')->textInput(['maxlength' => false, ]) ?>
<?= $form->field($model, 'dop_sved')->textInput(['maxlength' => false, ]) ?>
    <?= $form->field($model, 'primechanie')->fileInput() ?>

    <?= $form->field($model, 'vid_obr_id')->widget(\kartik\widgets\Select2::classname(),
        [
            'data' => \yii\helpers\ArrayHelper::map(\app\models\VidObr::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
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