<?php

/* @var $this yii\web\View */

if (isset($this)) {
    $this->title = 'Моя курсовая';
}
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">Разработка интерфейса ИС:</p>

        <h1>Учет обращений граждан</h1>


        <p><a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['/reg/index'])?>">Журнал обращений</a>
            <a class="btn btn-lg btn-primary" href="<?= \yii\helpers\Url::to(['/ispolnenie/index'])?>">Ответы</a></p>
        <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['/reg/create'])?>">Зарегистрировать новое обращение</a></p>
        <!-- Split button -->
        <div class="btn-group">
            <button type="button" class="btn btn-info">
                Справки
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="<?= \yii\helpers\Url::to(['/vid-obr/index'])?>">Вид обращений</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['/type-vydacha-otveta/index'])?>">Тип выдачи ответа</a></li>
            </ul>
        </div>
        <!-- Split button -->
        <div class="btn-group">
            <button type="button" class="btn btn-info">
                    Люди
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="<?= \yii\helpers\Url::to(['/zayvitel/index'])?>">Заявитель</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['/ispolnitel/index'])?>">Исполнитель</a></li>
            </ul>
        </div>
    </div>

</div>
