<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EstadoCivil $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estado-civil-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_estado_civil')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Soltero/a, Casado/a',
        ])->label('Nombre del Estado Civil') ?>
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

