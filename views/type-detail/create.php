<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeDetail */

$this->title = 'Create Type Detail';
$this->params['breadcrumbs'][] = ['label' => 'Type Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
