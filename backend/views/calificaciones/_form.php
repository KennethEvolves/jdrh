<?php

use backend\models\Grado;
use backend\models\Grupo;
use backend\models\PeriodoSemestral;
use backend\models\UnidadEstudio;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="calificaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_docente')->textInput() ?> -->
    <?=  $form->field($model,  'id_docente')->dropDownList($model->DocentesPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>

    <!-- <?= $form->field($model, 'id_unidad_estudio')->textInput() ?> -->
    <?= $form->field($model, 'id_unidad_estudio')->dropDownList( 
       				ArrayHelper::map(UnidadEstudio::find()->all(),'id_unidad','nombre_asignatura')) ?> 

    <!-- <?= $form->field($model, 'id_grado')->textInput() ?> -->
    <?= $form->field($model, 'id_grado')->dropDownList( 
       				ArrayHelper::map(Grado::find()->all(),'id_grado','nombre')) ?> 


    <!-- <?= $form->field($model, 'id_grupo')->textInput() ?> -->
    <?= $form->field($model, 'id_grupo')->dropDownList( 
       				ArrayHelper::map(Grupo::find()->all(),'id_grupo','nombre')) ?> 

    <!-- <?= $form->field($model, 'id_periodo_semestral')->textInput() ?> -->
    <?= $form->field($model, 'id_periodo_semestral')->dropDownList( 
       				ArrayHelper::map(PeriodoSemestral::find()->all(),'id_ciclo','periodo')) ?>    
   
    <!-- <?= $form->field($model, 'id_alumno')->textInput() ?> -->
    <?=  $form->field($model,  'id_alumno')->dropDownList($model->AlumnoPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>

    <?= $form->field($model, 'calif_m1')->textInput() ?>


    <?= $form->field($model, 'calif_m2')->textInput() ?>

    <?= $form->field($model, 'promedio')->textInput() ?>

    <?= $form->field($model, 'proyecto_integrador')->textInput() ?>

    <?= $form->field($model, 'calif_final')->textInput() ?>

    <?= $form->field($model, 'porcentaje_asistencia')->textInput() ?>

    <?= $form->field($model, 'id_generaciones')->label('Generación')->dropDownList(\yii\helpers\ArrayHelper::map(\backend\models\Generaciones::find()->all(), 'id_generacion', 'nombre')); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
