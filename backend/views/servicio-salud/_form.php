<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ServicioSalud $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicio-salud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_servicio')->textInput(['maxlength' => true])->label('Servicio de salud')  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
