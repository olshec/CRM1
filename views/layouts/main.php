<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use yii\bootstrap\Widget;
use yii\bootstrap\ButtonDropdown;
AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Система учета',//Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Домашняя', 'url' => ['/site/index']],
            ['label' => 'О системе', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],

            Yii::$app->user->isGuest ? (
                ['label' => 'Логин', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    
    NavBar::end();
    ?>
  
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/pr7/basic/web/'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Система учета <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>


<script>
jQuery(function($){
	
	$('.btn-primary').css('width','150px');

	console.log('Click count:'+ $('.btn-primary').css("width") );
});
</script>

</body>
</html>
<?php $this->endPage() ?>
