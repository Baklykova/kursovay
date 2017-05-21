<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Ispolnitel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ispolnitel'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ispolnitel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>