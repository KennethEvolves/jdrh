<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\InformacionAcademicaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="informacion-academica-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'inf_academica_id')->textInput([
                'placeholder' => 'ID Academia',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'estudio_adicional')->textInput([
                'placeholder' => 'Estudio Adicional',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'horas_estudio_diario')->textInput([
                'placeholder' => 'Horas de Estudio Diario',
                'class' => 'form-control'
            ]) ?>
        </div>

        <div class="col-md-3 mb-3">
            <?= $form->field($model, 'actividad_extraescolar')->textInput([
                'placeholder' => 'Actividad Extraescolar',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary btn-sm', 'title' => 'Buscar resultados']) ?>
        <?= Html::resetButton('Resetear', ['class' => 'btn btn-outline-secondary btn-sm', 'title' => 'Limpiar filtros']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
