<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Тип Выдачи Ответа');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Тип Выдачи Ответа'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-vydacha-otveta-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>