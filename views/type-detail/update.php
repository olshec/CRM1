<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeDetail */

$this->title = 'Update Type Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idTypeDetail]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
