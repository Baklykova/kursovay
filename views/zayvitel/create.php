<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Zayvitel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Zayvitel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zayvitel-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>