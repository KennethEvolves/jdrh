<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\OptTalleresInteresSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="opt-talleres-interes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'taller_id')->textInput([
            'placeholder' => 'Buscar por ID del Taller',
        ]) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'nombre_taller')->textInput([
            'placeholder' => 'Buscar por Nombre del Taller',
        ]) ?>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',  // Botón pequeño con fondo primario
            'title' => 'Haz clic para buscar',
            'aria-label' => 'Buscar',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm',  // Botón con borde
            'title' => 'Restablecer los filtros',
            'aria-label' => 'Restablecer',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
