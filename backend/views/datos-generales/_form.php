<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DatosGenerales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-generales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'licenciatura')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'generacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_expediente')->textInput() ?>

    <?= $form->field($model, 'capacitacion_previa')->textInput() ?>

    <?= $form->field($model, 'talleres_interes')->textInput() ?>

    <?= $form->field($model, 'tiempo_formacionIntegral')->textInput() ?>

    <?= $form->field($model, 'aspectos_sobresalientesEscuela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'areas_oportunidadEscuela')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preparatoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estudios_adicionales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primera_opcion_licenciatura')->textInput() ?>

    <?= $form->field($model, 'cursas_eleccionLicenciatura')->textInput() ?>

    <?= $form->field($model, 'posible_licenciaturaGusto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proyectoVida_cincoAños')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proyectoVida_diezAños')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'actividad_extracurricular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones_sugerencias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tiempo_estudio')->textInput() ?>

    <?= $form->field($model, 'id_motivosEstudioLicenciatura')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
