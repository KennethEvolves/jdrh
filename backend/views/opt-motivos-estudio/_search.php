<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\OptMotivosEstudioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="opt-motivos-estudio-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'motivo_id')->textInput([
            'placeholder' => 'ID del motivo',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_motivo')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Motivación académica',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para buscar',
            'aria-label' => 'Buscar motivo de estudio',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm',  // Botón de restablecer
            'title' => 'Haz clic para restablecer los filtros',
            'aria-label' => 'Restablecer filtros',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
