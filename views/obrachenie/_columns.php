<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 22.05.2017
 * Time: 18:22
 */

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
        'attribute' => 'krat_obr',
        'width' => '100px',
    ],

    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'dop_sved',
        'width' => '100px',
    ],
    [
        'attribute' => 'primechanie',
        'width' => '160px',
    ],
    [
        'class' => \kartik\grid\DataColumn::className(),
        'attribute' => 'vid_obr_id',
        'value' => function ($model) {
            if ($rel = $model->getVidObr()->one()) {
                return Html::a($rel->name, ['vid_obr/view', 'id' => $rel->id,], ['data-pjax' => 0]);
            } else {
                return '';
            }
        },
        'filterType' => \kartik\grid\GridView::FILTER_SELECT2,
        /*'filter' => \yii\helpers\ArrayHelper::map(\app\models\VidObr::find()->andFilterWhere(['active' => '1'])
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