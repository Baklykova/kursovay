<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Reg');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reg'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>
