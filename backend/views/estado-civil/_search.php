<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\EstadoCivilSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="estado-civil-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'estado_civil_id')->textInput([
            'type' => 'number',
            'min' => 1,
            'placeholder' => 'ID del Estado Civil',
        ])->label('ID del Estado Civil') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_estado_civil')->textInput([
            'maxlength' => true,
            'placeholder' => 'Ejemplo: Soltero/a, Casado/a',
        ])->label('Nombre del Estado Civil') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para buscar',
            'aria-label' => 'Buscar',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm',  // Botón de restablecer
            'title' => 'Restablecer los filtros',
            'aria-label' => 'Restablecer filtros',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
