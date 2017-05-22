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
<div class="reg-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Record # ') ?><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
        <?php
        $gridColumn = [
            'krat_obr',
            'dop_sved',
            'primechanie',
            [
                'attribute' => 'vidObr.name',
                'label' => Yii::t('app', 'Vid Obr'),
            ],

        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
</div>