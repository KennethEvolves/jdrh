<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */
/** @var array $estadoCivilOptions */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-familiares-form container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'needs-validation'], 
        'fieldConfig' => [
            'labelOptions' => ['class' => 'form-label font-weight-bold'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'text-danger font-italic'],
        ],
    ]); ?>

    <!-- Campo para Estado Civil -->
    <div class="mb-3">
        <?= $form->field($model, 'fk_estado_civil')->dropDownList(
            $estadoCivilOptions, 
            [
                'prompt' => 'Selecciona un estado civil', 
                'class' => 'form-select'
            ]
        )->label('Estado Civil') ?>
    </div>

    <!-- Campos para el padre -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el nombre del padre']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_apellido')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el apellido del padre']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_ocupacion')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa la ocupación del padre']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_fecha_nacimiento')->textInput([
                'type' => 'date',
                'placeholder' => 'Fecha de nacimiento del padre'
            ]) ?>
        </div>
    </div>

    <!-- Campos para la madre -->
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'madre_nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el nombre de la madre']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'madre_apellido')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa el apellido de la madre']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'madre_ocupacion')->textInput(['maxlength' => true, 'placeholder' => 'Ingresa la ocupación de la madre']) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'madre_fecha_nacimiento')->textInput([
                'type' => 'date',
                'placeholder' => 'Fecha de nacimiento de la madre'
            ]) ?>
        </div>
    </div>

    <!-- Botón para guardar -->
    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Guardar Cambios', [
            'class' => 'btn btn-outline-success btn-sm', 
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
