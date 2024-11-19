<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaMedico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="frecuencia-medico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'frecuencia')->textInput(['maxlength' => true])->label('¿Con que frecuencia asistes al médico?') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
