<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Новая запись');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Исполнитель'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ispolnitel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>