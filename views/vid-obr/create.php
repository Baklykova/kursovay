<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Vid Obr');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vid Obr'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vid-obr-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>

