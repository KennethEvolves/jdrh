<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosGeneralesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-generales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddatos_generales') ?>

    <?= $form->field($model, 'licenciatura') ?>

    <?= $form->field($model, 'generacion') ?>

    <?= $form->field($model, 'id_expediente') ?>

    <?= $form->field($model, 'capacitacion_previa') ?>

    <?php // echo $form->field($model, 'talleres_interes') ?>

    <?php // echo $form->field($model, 'tiempo_formacionIntegral') ?>

    <?php // echo $form->field($model, 'aspectos_sobresalientesEscuela') ?>

    <?php // echo $form->field($model, 'areas_oportunidadEscuela') ?>

    <?php // echo $form->field($model, 'preparatoria') ?>

    <?php // echo $form->field($model, 'estudios_adicionales') ?>

    <?php // echo $form->field($model, 'primera_opcion_licenciatura') ?>

    <?php // echo $form->field($model, 'cursas_eleccionLicenciatura') ?>

    <?php // echo $form->field($model, 'posible_licenciaturaGusto') ?>

    <?php // echo $form->field($model, 'proyectoVida_cincoAños') ?>

    <?php // echo $form->field($model, 'proyectoVida_diezAños') ?>

    <?php // echo $form->field($model, 'actividad_extracurricular') ?>

    <?php // echo $form->field($model, 'observaciones_sugerencias') ?>

    <?php // echo $form->field($model, 'tiempo_estudio') ?>

    <?php // echo $form->field($model, 'id_motivosEstudioLicenciatura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
