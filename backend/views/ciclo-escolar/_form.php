<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\CicloEscolar $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ciclo-escolar-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_ciclo_escolar')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: 2024-2028',
            'readonly' => true,
        ])->label('Nombre del Ciclo Escolar') ?>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'año_inicio')->textInput([
                'type' => 'number',
                'min' => 2000,
                'max' => 2100,
                'placeholder' => 'Año de inicio (ej. 2024)',
                'id' => 'año-inicio'
            ])->label('Año de Inicio') ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'año_fin')->textInput([
                'type' => 'number',
                'min' => 2000,
                'max' => 2100,
                'placeholder' => 'Año de fin (ej. 2025)',
                'id' => 'año-fin'
            ])->label('Año de Fin') ?>
        </div>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar Cambios', [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para guardar los cambios',
            'aria-label' => 'Guardar cambios',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const anioInicio = document.getElementById('año-inicio');
        const anioFin = document.getElementById('año-fin');
        const nombreCiclo = document.getElementById('<?= Html::getInputId($model, 'nombre_ciclo_escolar') ?>');

        // Función para actualizar el nombre del ciclo escolar
        function actualizarNombreCiclo() {
            const inicio = anioInicio.value;
            const fin = anioFin.value;
            if (inicio && fin) {
                nombreCiclo.value = `${inicio}-${fin}`;
            } else {
                nombreCiclo.value = ''; // Vaciar si falta un valor
            }
        }

        // Detectar cambios en los campos de año
        anioInicio.addEventListener('input', actualizarNombreCiclo);
        anioFin.addEventListener('input', actualizarNombreCiclo);
    });
</script>
