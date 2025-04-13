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
        'options' => ['class' => 'needs-validation'], 
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'text-danger font-italic'],
        ],
    ]); ?>

    <!-- Campos Generales -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45, 'placeholder' => 'Ingresa el nombre']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'apellido')->textInput(['maxlength' => 45, 'placeholder' => 'Ingresa el apellido']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <!-- Fecha de nacimiento como input de tipo date (estilo más moderno) -->
            <?= $form->field($model, 'fecha_nacimiento')->textInput([
                'type' => 'date',
                'placeholder' => 'Selecciona tu fecha de nacimiento',
                'class' => 'form-control',
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Selecciona el género', 'class' => 'form-select']) ?>
        </div>
    </div>

    <!-- Información de Contacto -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el número de teléfono']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'pagina_web')->textInput(['maxlength' => 255, 'placeholder' => 'Ingresa la página web (opcional)']) ?>
        </div>
    </div>

    <!-- Domicilio y Correo -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el domicilio']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'correo_personal')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el correo personal']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'correo_institucional')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el correo institucional']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'curp')->textInput(['maxlength' => 18, 'placeholder' => 'Ingresa la CURP']) ?>
        </div>
    </div>

    <!-- Emergencias -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'tel_emerg_principal')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa teléfono de emergencia']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'maya_hablante')->dropDownList(
                [1 => 'Sí', 0 => 'No'],
                ['prompt' => 'Selecciona si hablas maya', 'class' => 'form-select']
            ) ?>
        </div>
    </div>

    <!-- Nacimiento -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'ciudad_nacimiento')->textInput(['maxlength' => 45, 'placeholder' => 'Ingresa la ciudad de nacimiento']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'estado_nacimiento')->textInput(['maxlength' => 45, 'placeholder' => 'Ingresa el estado de nacimiento']) ?>
        </div>
    </div>

    <!-- Botón para guardar -->
    <div class="form-group text-center mt-4">
        <?= Html::submitButton($model->isNewRecord ? 'Crear perfil' : 'Actualizar perfil', [
            'class' => 'btn btn-outline-success btn-sm', 
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
