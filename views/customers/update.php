<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = 'Редактировать: ' . $model->firstName . ' ' . $model->lastName;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstName . ' ' . $model->lastName, 'url' => ['view', 'id' => $model->idCustomers]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
