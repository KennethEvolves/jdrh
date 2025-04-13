<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\GeneroSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="genero-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'id')->textInput([
                'placeholder' => 'ID',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'genero_nombre')->textInput([
                'placeholder' => 'Nombre del Género',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'ciclo_escolar_id')->textInput([
                'placeholder' => 'ID del Ciclo Escolar',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'nombre_ciclo_escolar')->textInput([
                'placeholder' => 'Nombre Ciclo Escolar',
                'class' => 'form-control'
            ]) ?>
        </div>

    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',  // Botón pequeño con borde
            'title' => 'Buscar Género',
            'aria-label' => 'Buscar Género',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
        <?= Html::resetButton('Reset', [
            'class' => 'btn btn-outline-secondary btn-sm',  // Botón pequeño con borde
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
