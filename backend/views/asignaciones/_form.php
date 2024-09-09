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
use backend\models\user;
use backend\models\TipoUsuario;
use frontend\models\Perfil;
use backend\models\Rol;
use backend\models\UnidadEstudio;


/** @var yii\web\View $this */
/** @var backend\models\Asignaciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignaciones-form">

    <?php $form = ActiveForm::begin(); ?>


    <!-- <?= $form->field($model, 'usuario_idusuario')->textInput() ?> -->
    <?=  $form->field($model,  'usuario_idusuario')->dropDownList($model->DocentesPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>

    <!-- <?= $form->field($model, 'grupo_id_grupo')->textInput() ?> -->
    <?= $form->field($model, 'grupo_id_grupo')->dropDownList( 
       				ArrayHelper::map(Grupo::find()->all(),'id_grupo','nombre')) ?>
    
    <!-- <?= $form->field($model, 'periodo_semestral_id_ciclo')->textInput() ?> -->
    <?= $form->field($model, 'periodo_semestral_id_ciclo')->dropDownList( 
       				ArrayHelper::map(PeriodoSemestral::find()->all(),'id_ciclo','periodo')) ?>    


    <?php
        $c= new Carrera();  
        $p= new PlanEstudios();          
    ?>


    <?= $form->field($c, 'id_carrera')->dropDownList(
        ArrayHelper::map(Carrera::find()->all(), 'id_carrera','nombre'),
        ['prompt' => 'Selecciona una Carrera',
         'onchange' => '$.post("index.php?r=plan-estudios/list&id='.'"+$(this).val(), function(data) {$("select#planestudios-id_plan").html(data);
         });']);
    ?> 
    

    <?= $form->field($p, 'id_plan')->dropDownList(
        ArrayHelper::map(PlanEstudios::find()->all(), 'id_plan','nombre'),
        ['prompt' => 'Selecciona un Plan de Estudios',
         'onchange' => '$.post("index.php?r=unidad-estudio/list&id='.'"+$(this).val(), function(data) {$("select#asignacion-id_carrera").html(data);
         });'

        ]);
    ?>

    <!-- <?= $form->field($model, 'unidad_estudio_id_unidad')->textInput() ?> -->
    
    <?= $form->field($model, 'unidad_estudio_id_unidad')->dropDownList( 
       				ArrayHelper::map(UnidadEstudio::find()->all(),'id_unidad','nombre_asignatura'),
                ['prompt' => 'Selecciona una unidad de estudio',
                'onchange' => '$.post("index.php?r=unidad-estudio/list&id='.'"+$(this).val(), function(data) {$("select#asignacion-id_carrera").html(data);'


                ]);

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





   

              
    



    




