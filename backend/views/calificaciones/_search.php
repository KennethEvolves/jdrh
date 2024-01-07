<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\CalificacionesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="calificaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_calificaciones') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'asistencia') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'rasgos_evaluar') ?>

    <?php // echo $form->field($model, 'usuario_alumno') ?>

    <?php // echo $form->field($model, 'usuario_docente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
