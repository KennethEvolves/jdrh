<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OptMotivosEstudio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="opt-motivos-estudio-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_motivo')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Motivación académica, Aprender algo nuevo',
        ])->label('Nombre del Motivo de Estudio') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar', [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para guardar el motivo de estudio',
            'aria-label' => 'Guardar motivo de estudio',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
