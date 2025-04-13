<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'], // Etiquetas más llamativas
            'inputOptions' => ['class' => 'form-control'], // Inputs con estilo profesional
            'errorOptions' => ['class' => 'text-danger font-italic'], // Mensajes de error en rojo
        ],
    ]); ?>

    <!-- Nombre y Apellido en dos columnas -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu nombre',
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'apellido')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu apellido',
            ]) ?>
        </div>
    </div>

    <!-- Fecha de nacimiento con DatePicker -->
    <div class="mb-3">
        <?= $form->field($model, 'fecha_nacimiento')->widget(DatePicker::className(), [
            'dateFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'yearRange' => '-115:+0',
                'changeYear' => true
            ],
            'class' => 'form-control',
        ]) ?>
    </div>

    <!-- Género -->
    <div class="mb-3">
        <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, [
            'prompt' => 'Seleccione un género',
            'class' => 'form-control',
        ]) ?>
    </div>

    <!-- Teléfono, página web y domicilio -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'telefono')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu teléfono',
            ]) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'pagina_web')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu página web',
            ]) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'domicilio')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu domicilio',
            ]) ?>
        </div>
    </div>

    <!-- Correos y CURP -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'correo_personal')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu correo personal',
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'correo_institucional')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu correo institucional',
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'curp')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingresa tu CURP',
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'tel_emerg_principal')->textInput([
                'maxlength' => true,
                'placeholder' => 'Teléfono de emergencia',
            ]) ?>
        </div>
    </div>

    <!-- Maya hablante (opciones en fila) -->
    <div class="row">
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'maya_hablante')->radioList(
                [1 => 'Sí', 0 => 'No'],  // Opciones para el radio list
                [
                    'item' => function($index, $label, $name, $checked, $value) {
                        $checked = $checked ? 'checked' : '';
                        return "<label class='form-check-label' style='margin-right: 15px;'>
                                    <input type='radio' name='{$name}' value='{$value}' {$checked} class='form-check-input'>
                                    {$label}
                                </label>";
                    },
                    'class' => 'form-check-inline',
                ]
            ) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'ciudad_nacimiento')->textInput([ 
                'maxlength' => true, 
                'placeholder' => 'Ciudad de nacimiento', 
            ]) ?>
        </div>
        <div class="col-md-4 mb-3">
            <?= $form->field($model, 'estado_nacimiento')->textInput([ 
                'maxlength' => true, 
                'placeholder' => 'Estado de nacimiento', 
            ]) ?>
        </div>
    </div>

    <!-- Botón de acción -->
    <div class="form-group text-center mt-4">
        <?= Html::submitButton($model->isNewRecord ? 'Crear perfil' : 'Actualizar perfil', [
            'class' => $model->isNewRecord ? 'btn btn-outline-success btn-sm' : 'btn btn-outline-primary btn-sm',
            'title' => $model->isNewRecord ? 'Haz clic para crear' : 'Haz clic para actualizar',
            'aria-label' => $model->isNewRecord ? 'Crear' : 'Actualizar',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
