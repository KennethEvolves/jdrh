<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\UnidadEstudioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidad-estudio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_unidad') ?>

    <?= $form->field($model, 'clave') ?>

    <?= $form->field($model, 'nombre_asignatura') ?>

    <?= $form->field($model, 'creditos_asignatura') ?>

    <?= $form->field($model, 'des_general') ?>

    <?php // echo $form->field($model, 'ras_perfil') ?>

    <?php // echo $form->field($model, 'sabe_profesionales') ?>

    <?php // echo $form->field($model, 'elem_universo') ?>

    <?php // echo $form->field($model, 'num_momentos') ?>

    <?php // echo $form->field($model, 'satca') ?>

    <?php // echo $form->field($model, 'semestre') ?>

    <?php // echo $form->field($model, 'plan_estudios_id_plan') ?>

    <?php // echo $form->field($model, 'fases_id_fase') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
