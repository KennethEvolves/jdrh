<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsicologico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tratamiento-psicologico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_psicologo')->textInput(['maxlength' => true]) ->label('¿Asistes o has asistio a un psicologo?')?>

    <?= $form->field($model, 'tipo_tiempo')->textInput(['maxlength' => true]) ->label('¿cuanto tiempo?')?>

    <?= $form->field($model, 'tipo_lugar')->textInput(['maxlength' => true]) ->label('¿En donde?')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
