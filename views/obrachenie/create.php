<?php


use yii\helpers\Html;


$this->title = Yii::t('app', 'Create Obrachenie');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Obrachenie'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obrachenie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>