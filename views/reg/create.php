<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Зарегистрировать новое');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Обращения'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reg-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>
