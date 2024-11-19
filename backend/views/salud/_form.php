<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Salud $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tratamiento_medico')->textInput(['maxlength' => true])->label('Actualmente ¿te encuentras bajo algún tratamiento médico?') ?>

    <?= $form->field($model, 'tipo_sangre_id_tipoSangre')->textInput() ->label('Tipo de sangre')?>

    <?= $form->field($model, 'id_frecuenciaDentista')->textInput()->label('¿Con qué frecuencia asistes al dentista?') ?>

    <?= $form->field($model, 'id_tratamientoPsicologico')->textInput()->label('¿Has asistido o asistes a tratamiento psicológico?')  ?>

    <?= $form->field($model, 'id_servicioSalud')->textInput()->label('¿Cuentas con algún tipo de servicio de salud?')  ?>

    <?= $form->field($model, 'id_alergias')->textInput()->label('Si eres alérgica/o a algo, detállalo a continuación, de lo contrario, escribe N/A:')  ?>

    <?= $form->field($model, 'id_tratamientoPsiquiatrico')->textInput()->label('¿Has asistido o asistes a tratamiento psiquiátrico?')  ?>

    <?= $form->field($model, 'id_problemasUltimoSemestre')->textInput()->label('Durante el último semestre ¿has tenido algún problema de salud?')  ?>

    <?= $form->field($model, 'id_frecuenciaMedico')->textInput()->label('¿Con qué frecuencia asistes al médico?')  ?>

    <?= $form->field($model, 'id_usoAnteojos')->textInput()->label('¿Necesitas/usas anteojos?') ?>

    <?= $form->field($model, 'id_vacunas')->textInput()->label('Selecciona las vacunas que te has aplicado en los últimos 6 meses')  ?>

    <?= $form->field($model, 'id_afiliacionEscuela')->textInput()->label('En caso de contar con el servicio médico del IMSS ¿te afiliaste a través de la Escuela Normal?')  ?>

    <?= $form->field($model, 'id_comiteEN')->textInput()->label('Si perteneces a algún comité de la EN, selecciónalo de la lista:')  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
