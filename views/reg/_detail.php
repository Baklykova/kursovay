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
            'attribute' => 'vidObr.name',
            'label' => Yii::t('app', 'Vid Obr'),
        ],
        [
            'attribute' => 'zayvitel.fio',
            'label' => Yii::t('app', 'Zayvitel'),
        ],
        [
            'attribute' => 'ispolnitel.fio',
            'label' => Yii::t('app', 'Ispolnotel'),
        ],
        'kyda',
        'date',
        'obrachenie',
        'primechanie',
       
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>