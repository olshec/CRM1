<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distributer */

$this->title = 'Create Distributer';
$this->params['breadcrumbs'][] = ['label' => 'Distributers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distributer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
