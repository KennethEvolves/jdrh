<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\OptMotivosEstudio;
use backend\models\OptTemasCapacitacion;
use backend\models\OptTalleresInteres;

/** @var yii\web\View $this */
/** @var backend\models\InformacionAcademica $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="informacion-academica-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'estudio_adicional')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Maestría en Física',
        ])->label('Estudio Adicional') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'horas_estudio_diario')->textInput([
            'type' => 'number',
            'min' => 0,
            'placeholder' => 'Ejemplo: 3 horas',
        ])->label('Horas de Estudio Diario') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'actividad_extraescolar')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Voluntariado en ONG',
        ])->label('Actividad Extraescolar') ?>
    </div>

    <!-- Campo Mejorado de Motivos de Estudio -->
    <div class="mb-3">
        <?= $form->field($model, 'motivosEstudios')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(OptMotivosEstudio::find()->all(), 'motivo_id', 'nombre_motivo'),
            'options' => [
                'placeholder' => 'Selecciona los motivos...',
                'multiple' => true,
                'class' => 'form-select font-weight-bold' // Agregado para mejorar el estilo visual y hacer las opciones más visibles
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '100%' // Aseguramos que el campo tenga el 100% de ancho disponible
            ],
        ])->label('Motivos de Estudio') ?>
    </div>

    <!-- Campo Mejorado de Temas de Capacitación -->
    <div class="mb-3">
        <?= $form->field($model, 'temasCapacitaciones')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(OptTemasCapacitacion::find()->all(), 'tema_id', 'nombre_tema'),
            'options' => [
                'placeholder' => 'Selecciona los temas...',
                'multiple' => true,
                'class' => 'form-select font-weight-bold' // Agregado para mejorar el estilo visual y hacer las opciones más visibles
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '100%' // Aseguramos que el campo tenga el 100% de ancho disponible
            ],
        ])->label('Temas de Capacitación') ?>
    </div>

    <!-- Campo Mejorado de Talleres de Interés -->
    <div class="mb-3">
        <?= $form->field($model, 'talleresInteres')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(OptTalleresInteres::find()->all(), 'taller_id', 'nombre_taller'),
            'options' => [
                'placeholder' => 'Selecciona los talleres...',
                'multiple' => true,
                'class' => 'form-select font-weight-bold' // Agregado para mejorar el estilo visual y hacer las opciones más visibles
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '100%' // Aseguramos que el campo tenga el 100% de ancho disponible
            ],
        ])->label('Talleres de Interés') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar cambios', [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para guardar los cambios',
            'aria-label' => 'Guardar cambios',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
