<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 04.05.2017
 * Time: 18:57
 */

use yii\helpers\Html;


$this->title = Yii::t('app', 'Update {modelClass}: ', [
        'modelClass' => 'Obrachenie',
    ]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Obrachenie'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<div class="obrachenie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>