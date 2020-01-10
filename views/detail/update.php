<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detail */

$this->title = 'Обновить деталь: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Детали', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idDetail]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
