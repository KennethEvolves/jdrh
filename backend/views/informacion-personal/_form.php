<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\InformacionPersonal $model */
/** @var yii\widgets\ActiveForm $form */
/** @var array $licenciaturas */
/** @var array $ciclosEscolares */
?>

<div class="informacion-personal-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'fk_licenciatura')->dropDownList(
            $licenciaturas, // Lista de opciones de licenciaturas
            [
                'prompt' => 'Selecciona la licenciatura', // Mensaje por defecto
            ]
        )->label('Licenciatura') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'fk_ciclo_escolar')->dropDownList(
            $ciclosEscolares, // Lista de opciones de ciclos escolares
            [
                'prompt' => 'Selecciona el ciclo escolar', // Mensaje por defecto
            ]
        )->label('Ciclo Escolar') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'primera_opcion')->dropDownList(
            [1 => 'Sí', 0 => 'No'], // Opciones Sí y No
            [
                'prompt' => 'Selecciona una opción', // Mensaje por defecto
            ]
        )->label('Primera Opción') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'eleccion_definitiva')->dropDownList(
            [1 => 'Sí', 0 => 'No'], // Opciones Sí y No
            [
                'prompt' => 'Selecciona una opción', // Mensaje por defecto
            ]
        )->label('Elección Definitiva') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'otra_licenciatura')->textInput([
            'maxlength' => true,
            'placeholder' => 'Si tienes otra opción, indícalo aquí',
        ])->label('Otra Licenciatura') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'proyecto_5_anios')->textarea([
            'rows' => 6,
            'placeholder' => 'Describe tu proyecto a 5 años',
        ])->label('Proyecto a 5 Años') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'proyecto_10_anios')->textarea([
            'rows' => 6,
            'placeholder' => 'Describe tu proyecto a 10 años',
        ])->label('Proyecto a 10 Años') ?>
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
