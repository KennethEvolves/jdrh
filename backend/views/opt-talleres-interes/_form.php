<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\OptTalleresInteres $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="opt-talleres-interes-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_taller')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Taller de Programación, Diseño Gráfico',
        ])->label('Nombre del Taller') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar', [
            'class' => 'btn btn-outline-success btn-lg px-5', // Botón con borde y tamaño grande
            'title' => 'Haz clic para guardar el taller de interés',
            'aria-label' => 'Guardar taller de interés',
            'style' => 'border-radius: 20px;', // Estilo con bordes redondeados
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
