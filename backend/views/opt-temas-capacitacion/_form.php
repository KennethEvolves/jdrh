<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OptTemasCapacitacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="opt-temas-capacitacion-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_tema')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Desarrollo Web, Capacitación en Marketing',
        ])->label('Nombre del Tema de Capacitación') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar', [
            'class' => 'btn btn-outline-success btn-lg px-5', // Botón con borde y tamaño grande
            'title' => 'Haz clic para guardar el tema de capacitación',
            'aria-label' => 'Guardar tema de capacitación',
            'style' => 'border-radius: 20px;', // Estilo con bordes redondeados
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
