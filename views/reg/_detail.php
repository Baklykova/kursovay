<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

?>
<div class="reg-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Record # ') ?><?= Html::encode($model->reg-num) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'reg_num',
        [
            'attribute' => 'zayvitel.fio',
            'label' => Yii::t('app', 'Zayvitel'),
        ],
        [
            'attribute' => 'ispolnitel.fio',
            'label' => Yii::t('app', 'Ispolnotel'),
        ],
        'tema_obr',
        'date',
        [
            'attribute' => 'vidObr.name',
            'label' => Yii::t('app', 'Vid Obr'),
        ],
        [
            'attribute' => 'obrachenie.krat_obr',
            'label' => Yii::t('app', 'Obrachenie'),
        ],


        //['attribute' => 'lock', 'hidden' => true],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>