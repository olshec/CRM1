<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Система учета клиентов';
?>



<div class="site-index">

    <div class="jumbotron">
<!--         <h1>Congratulations!</h1> -->

        <p class="lead">Информационная система для учета клиентов ЗАО ТФД "Брок-Инвест-Сервис и К</p>

<!--         <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
    </div>

    <div class="body-content">
			<div align="center"> 
                <h2>Перейти на форму:</h2>
                    <?= Html::a('Города', ['/city'],  ['class' => ['btn', 'btn-primary']]) ?>
<!--                     <br><br> -->
                    <?= Html::a('Страны', ['/country'],  ['class' => ['btn', 'btn-primary']] ) ?>
<!--                     <br><br> -->
                    <?= Html::a('Клиенты', ['/customers'],  ['class' => ['btn', 'btn-primary']] ) ?>
    		</div>

    </div>
</div>


