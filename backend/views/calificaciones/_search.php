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

    <?= $form->field($model, 'id_calificacion') ?>

    <?= $form->field($model, 'id_docente') ?>

    <?= $form->field($model, 'id_unidad_estudio') ?>

    <?= $form->field($model, 'id_grado') ?>

    <?php // echo $form->field($model, 'id_grupo') ?>

    <?php // echo $form->field($model, 'id_periodo_semestral') ?>

    <?php // echo $form->field($model, 'id_alumno') ?>

    <?php // echo $form->field($model, 'calif_m1') ?>

    <?php // echo $form->field($model, 'calif_m2') ?>

    <?php // echo $form->field($model, 'promedio') ?>

    <?php // echo $form->field($model, 'proyecto_integrador') ?>

    <?php // echo $form->field($model, 'calif_final') ?>

    <?php // echo $form->field($model, 'porcentaje_asistencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
