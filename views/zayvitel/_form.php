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

    <div class="zayvitel-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'fio')->textInput() ?>
    <?= $form->field($model, 'telefon')->textInput() ?>
    <?= $form->field($model, 'address')->textInput() ?>
    <?php /*= $form->field($model, 'email')->textInput() */?>

        <?php if (!Yii::$app->request->isAjax){ ?>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        <?php } ?>

        <?php ActiveForm::end(); ?>

    </div>