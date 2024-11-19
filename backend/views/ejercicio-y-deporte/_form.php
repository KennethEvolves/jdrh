<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EjercicioYDeporte $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ejercicio-ydeporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'veces_ejercicio')->textInput(['maxlength' => true])->label('¿Cuántas veces a la semana haces ejercicio físico?(1a2, 3a4, 5a7, Nunca)')?>

    <?= $form->field($model, 'id_actividad')->textInput()->label('Actividad que realizas')?>

    <?= $form->field($model, 'id_deporte')->textInput()->label('Deporte que realizas')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
