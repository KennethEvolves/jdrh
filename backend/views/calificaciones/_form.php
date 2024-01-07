<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use backend\models\Docentes;
use backend\models\Grupo;
use backend\models\CicloEducativo;
use backend\models\Asignatura;
use backend\models\Carrera;
use backend\models\PeriodoSemestral;
use backend\models\PlanEstudios;
use common\models\User;
use backend\models\TipoUsuario;
use frontend\models\Perfil;
use backend\models\Rol;
use backend\models\UnidadEstudio;

/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="calificaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'asistencia')->textInput() ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?= $form->field($model, 'rasgos_evaluar')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'usuario_alumno')->textInput() ?> -->
    <?=  $form->field($model,  'usuario_alumno')->dropDownList($model->AlumnosPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>


    <!-- <?= $form->field($model, 'usuario_docente')->textInput() ?> -->
    <?=  $form->field($model,  'usuario_docente')->dropDownList($model->DocentesPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
