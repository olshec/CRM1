<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeDetail */

$this->title = 'Добавить тип деталей';
$this->params['breadcrumbs'][] = ['label' => 'Тип деталей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
