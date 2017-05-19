<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use app\components\grid\CombinedDataColumn as CDC;

return [
    ['class' => 'yii\grid\SerialColumn'],
    [
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'fio',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'telefon',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'address',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'email',
        'width' => '100px',
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'template' => '{save-as-new} {view} {update} {delete}',
        'buttons' => [
            'save-as-new' => function ($url) {
                return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
            },
        ],

    ],
];
