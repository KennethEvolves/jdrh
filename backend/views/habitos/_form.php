<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Habitos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="habitos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'habito_fumar')->textInput(['maxlength' => true])->label('¿Fumas?')?>

    <?= $form->field($model, 'num_cigarros')->textInput(['maxlength' => true])->label('¿Cúantos cigarros por día?(1 a 5, 6 a 10, 10 o más)') ?>

    <?= $form->field($model, 'habito_alcohol')->textInput(['maxlength' => true])->label('¿Consumes cervezas o licores?') ?>

    <?= $form->field($model, 'veces_semana')->textInput(['maxlength' => true])->label('¿Cuántas veces por semana?(Una, 2 a 3, 4 o más)') ?>

    <?= $form->field($model, 'id_adicciones')->textInput()->label('¿Tienes alguna adicción?') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
