<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Location</h2>
                    <?= Html::a('City', ['/city'],  ['class' => ['btn', 'btn-primary']]) ?>
                    <br><br>
                    <?= Html::a('Country', ['/country'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            
            
            <div class="col-lg-4">
                <h2>Deliveries</h2>
                    <?= Html::a('distributer', ['/distributer'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('customer', ['/customers'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('order', ['/order'],  ['class' => ['btn', 'btn-primary']] ) ?>
            </div>
            
            
            <div class="col-lg-4">
                <h2>Details</h2>
               		<?= Html::a('detail', ['/detail'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>
                    <?= Html::a('type detail', ['/type-detail'],  ['class' => ['btn', 'btn-primary']] ) ?>
                    <br><br>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>


