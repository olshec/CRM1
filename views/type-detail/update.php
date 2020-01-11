<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeDetail */

$this->title = 'Обновить тип детали: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тип деталей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idTypeDetail]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="type-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
