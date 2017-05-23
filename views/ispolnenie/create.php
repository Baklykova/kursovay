<?php

use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Ispolnenie');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Obrachenie'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ispolnenie-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>