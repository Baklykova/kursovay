<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Новый вид обращения');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Вид обращений'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vid-obr-create">

 <h1><?= Html::encode($this->title) ?></h1>

 <?= $this->render('_form', [
     'model' => $model,
 ]) ?>

</div>

