<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDetail') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'cost') ?>

    <?= $form->field($model, 'Distributer_idDistributer') ?>

    <?= $form->field($model, 'TypeDetail_idTypeDetail')  ?>  
   
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
