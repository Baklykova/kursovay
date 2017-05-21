<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 21.05.2017
 * Time: 10:28
 */

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use app\components\grid\CombinedDataColumn as CDC;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'fio',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'dolgnost',
        'width' => '100px',
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) {
            return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>Yii::t('app','View'),'data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>Yii::t('app','Update'), 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>Yii::t('app','Delete'),
            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
            'data-request-method'=>'post',
            'data-toggle'=>'tooltip',
            'data-confirm-title'=>Yii::t('app','Are you sure?'),
            'data-confirm-message'=>Yii::t('app','Are you sure want to delete this item')],
    ],
];
