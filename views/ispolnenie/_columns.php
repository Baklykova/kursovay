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
        'attribute' => 'reg_obr_id',
        'value' => function ($model) {
            if ($rel = $model->getReg()->one()) {
                return Html::a($rel->name, ['reg-obr/view', 'id' => $rel->id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        /*'filter' => \yii\helpers\ArrayHelper::map(\app\models\Reg::find()->andFilterWhere(['active' => '1'])
            ->orderBy('reg_num')->asArray()->all(), 'id', 'reg_num'),*/
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Регистрационный номер '],
        'format' => 'raw',
        'width' => '130px',
    ],

    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'date',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'rezyltat_otveta',
        'width' => '100px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'otvet',
        'width' => '100px',
    ],
    [
        'attribute' => 'dop_otveta',
        'width' => '160px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'type_vydacha_otveta_id',
        'value' => function ($model) {
            if ($rel = $model->getTypeVydachaOtveta()->one()) {
                return Html::a($rel->name, ['type-vydacha-otveta/view', 'id' => $rel->id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
       /*'filter' => \yii\helpers\ArrayHelper::map(\app\models\TypeVydachaOtveta::find()->andFilterWhere(['active' => '1'])
            ->orderBy('name')->asArray()->all(), 'id', 'name'),*/
        'filterWidgetOptions' => [
            'pluginOptions' => ['allowClear' => true],
        ],
        'filterInputOptions' => ['placeholder' => 'Вид обращения'],
        'format' => 'raw',
        'width' => '130px',
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

?>