<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Carrera;
use backend\models\Fases;
use backend\models\PlanEstudios;

use kartik\editors\Summernote;

/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="unidad-estudio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_asignatura')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'creditos_asignatura')->textInput() ?>
    


    <!-- este es el original sin agregar el editors por eso esta comentado -->
    <!-- <?= $form->field($model, 'des_general')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ras_perfil')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sabe_profesionales')->textarea(['rows' => 6]) ?> -->




    <!-- Utilizando Summernote como editor de texto -->
    <?= $form->field($model, 'des_general')->widget(Summernote::class, [
            'options' => ['rows' => 6],
            'pluginOptions' => [
                // Opciones específicas de Summernote si es necesario
            ],
        ]) ?>

        <!-- Puedes repetir el mismo patrón para otros campos de texto -->
        <?= $form->field($model, 'ras_perfil')->widget(Summernote::class, [
            'options' => ['rows' => 6],
            'pluginOptions' => [
                // Opciones específicas de Summernote si es necesario
            ],
        ]) ?>

        <?= $form->field($model, 'sabe_profesionales')->widget(Summernote::class, [
            'options' => ['rows' => 6],
            'pluginOptions' => [
                // Opciones específicas de Summernote si es necesario
            ],
        ]) ?>




    <?= $form->field($model, 'elem_universo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'num_momentos')->textInput() ?>

    <?= $form->field($model, 'satca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semestre')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'plan_estudios_id_plan')->textInput() ?>

    <?= $form->field($model, 'fases_id_fase')->textInput() ?> -->




    <?= $form->field($model, 'plan_estudios_id_plan')->dropDownList(
                    ArrayHelper::map(PlanEstudios::find()->all(),'id_plan','nombre'));?>

    <?= $form->field($model, 'fases_id_fase')->dropDownList(
                    ArrayHelper::map(Fases::find()->all(),'id_fase','nombre'));?>                
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





