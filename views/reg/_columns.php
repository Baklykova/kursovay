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
        'attribute' => 'reg-num',
        'width' => '100px',
    ],
   [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'zayvitel_id',
        'value' => function ($model) {
            if ($rel = $model->getProfile()->one()) {
                return Html::a($rel->fio, ['zayvitel/view', 'id' => $rel->zayvitel_id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
      'filter' => \yii\helpers\ArrayHelper::map(\app\models\Zayvitel::find()
        ->orderBy('fio')->asArray()->all(), 'zayvitel_id', 'fio'),
    'filterWidgetOptions' => [
        'pluginOptions' => ['allowClear' => true],
    ],
    'filterInputOptions' => ['placeholder' => 'Заявитель'],
    'format' => 'raw',
    'width' => '130px',
],

     [
       'class' => \kartik\grid\DataColumn::className(),
       'attribute' => 'ispolnitel_id',
       'value' => function ($model) {
           if ($rel = $model->getProfile()->one()) {
               return Html::a($rel->fio, ['ispolnitel/view', 'id' => $rel->ispolnitel_id,], ['data-pjax' => 0]);
           } else {
               return '';
           }
       },
       'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
     'filter' => \yii\helpers\ArrayHelper::map(\app\models\Ispolnitel::find()
          ->orderBy('fio')->asArray()->all(), 'ispolnitel_id', 'fio'),
      'filterWidgetOptions' => [
          'pluginOptions' => ['allowClear' => true],
      ],
      'filterInputOptions' => ['placeholder' => 'Исполнитель'],
      'format' => 'raw',
      'width' => '130px',
  ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'tema_obr',
        'width' => '100px',
    ],
    [
        'attribute' => 'date',
        'width' => '160px',
    ],
    /* [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'vid_obr_id',
        'value' => function ($model) {
            if ($rel = $model->getConsPoints()->one()) {
                return Html::a($rel->name, ['ovid_obr/view', 'id' => $rel->id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\app\models\Obrachenie::find()->andFilterWhere(['active' => '1'])
            ->orderBy('name')->asArray()->all(), 'id', 'name'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Вид обращения'],
        'format' => 'raw',
        'width' => '130px',
    ],*/
   /* [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'obrachenie_id',
        'value' => function ($model) {
            if ($rel = $model->getConsPoints()->one()) {
                return Html::a($rel->krat_obr, ['obrachenie/view', 'id' => $rel->id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        'filter' => \yii\helpers\ArrayHelper::map(\app\models\Obrachenie::find()->andFilterWhere(['active' => '1'])
            ->orderBy('krat_obr')->asArray()->all(), 'id', 'krat_obr'),
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Обращение'],
        'format' => 'raw',
        'width' => '130px',
    ],*/
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

?>