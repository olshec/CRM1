<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'countDetail')->textInput() ?>
    
	<?= $form->field($model, 'Customers_idCustomers')    
        ->dropDownList($model->getCustomers())
        ->label('Клиенты') ?>
    
    <?= $form->field($model, 'Detail_idDetail')    
        ->dropDownList($model->getDetails())
        ->label('Детали') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
