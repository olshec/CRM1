<?php

use app\models\TypeDetail;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'Distributer_idDistributer')
        ->dropDownList($model->getNameDistributers())
        ->label('Производитель') ?>

    <?= $form->field($model, 'TypeDetail_idTypeDetail')    
        ->dropDownList($model->getTypeDetails())
        ->label('Тип оборудования') ?>



    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
