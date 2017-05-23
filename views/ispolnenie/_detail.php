<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 22.05.2017
 * Time: 19:47
 */

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

?>
<div class="ispolnenie-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Record # ') ?><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
        <?php
        $gridColumn = [
            [
                'attribute' => 'reg.reg_num',
                'label' => Yii::t('app', 'Reg num'),
            ],            
            'date',
            'rezyltat_otveta',
            'otvet',
            'dop_otveta',
            [
                'attribute' => 'typeVydachaOtveta.name',
                'label' => Yii::t('app', 'type vydacha otveta'),
            ],

        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
</div>