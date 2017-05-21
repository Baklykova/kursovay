<?php

use yii\widgets\DetailView;

?>
<div class="ispolnitel-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fio',
            'dolgnost',
        ],
    ]) ?>

</div>