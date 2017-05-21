<?php

use yii\widgets\DetailView;

?>
<div class="zayvitel-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fio',
            'telefon',
            'address',
           // 'email',
        ],
    ]) ?>

</div>