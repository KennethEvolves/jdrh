<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\PercepcionInstitucionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="percepcion-institucion-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'per_inst_id')->textInput([
            'placeholder' => 'ID de Percepción'
        ])->label('ID de Percepción') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'aspectos_positivos')->textInput([
            'maxlength' => true,
            'placeholder' => 'Aspectos positivos...'
        ])->label('Aspectos Positivos') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'areas_oportunidad')->textInput([
            'maxlength' => true,
            'placeholder' => 'Áreas de oportunidad...'
        ])->label('Áreas de Oportunidad') ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'observaciones')->textInput([
            'maxlength' => true,
            'placeholder' => 'Observaciones...'
        ])->label('Observaciones') ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',  // Botón con estilo moderno
            'title' => 'Buscar registros',
            'aria-label' => 'Buscar',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm ms-2',  // Botón con borde para resetear
            'title' => 'Restablecer los filtros',
            'aria-label' => 'Restablecer',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
