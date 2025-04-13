<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\LicenciaturasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="licenciaturas-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => 'needs-validation'], // Clase para mejorar validación
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'licenciatura_id')->textInput([
            'placeholder' => 'Ejemplo: 2024',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_licenciatura')->textInput([
            'placeholder' => 'Nombre de la licenciatura',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'desc_licenciatura')->textInput([
            'placeholder' => 'Descripción de la licenciatura',
            'class' => 'form-control',
        ]) ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-outline-primary btn-sm', // Botón pequeño con borde
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;', // Estilo sutil
            'title' => 'Haz clic para buscar licenciaturas',
            'aria-label' => 'Buscar licenciaturas',
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm', // Botón pequeño con borde
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;', // Estilo sutil
            'title' => 'Haz clic para restablecer los filtros',
            'aria-label' => 'Restablecer filtros',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
