<?php
/**
 * Created by PhpStorm.
 * User: Valya
 * Date: 04.05.2017
 * Time: 18:57
 */

use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VidObr*/
?>
<div class="vidObr-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>