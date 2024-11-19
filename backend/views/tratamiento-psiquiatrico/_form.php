<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsiquiatrico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tratamiento-psiquiatrico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_psiquiatra')->textInput(['maxlength' => true])->label('¿Asistes o has asistio a un psiquiatrico?') ?>

    <?= $form->field($model, 'tipo_tiempo')->textInput(['maxlength' => true])->label('¿cuanto tiempo?') ?>

    <?= $form->field($model, 'tipo_lugar')->textInput(['maxlength' => true])->label('¿En donde?') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
