<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 04.05.2017
 * Time: 18:57
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Obrachenie'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obrachenie-view">
    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Obrachenie').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
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