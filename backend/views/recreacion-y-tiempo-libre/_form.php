<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\RecreacionYTiempoLibre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recreacion-ytiempo-libre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uso_internet')->textInput(['maxlength' => true])->label('¿Sabes usar internet?') ?>

    <?= $form->field($model, 'acceso_internet')->textInput(['maxlength' => true])->label('¿Tienes acceso a internet?')?>

    <?= $form->field($model, 'cuestionamiento_usoInternet')->textInput(['maxlength' => true])->label('¿Para que utilizas internet?') ?>

    <?= $form->field($model, 'areasInteres')->textarea(['rows' => 6])->label('Escribe aquí tus áreas, actividades y/o temas de interés:') ?>

    <?= $form->field($model, 'id_lugarAcceso')->textInput()->label('Lugar principal donde tienes acceso a internet')?>

    <?= $form->field($model, 'id_participacionOrganizacion')->textInput()->label('¿Perteneces/participas en alguna organización social, religiosa, política?') ?>

    <?= $form->field($model, 'id_interesesPersonales')->textInput()->label('Selecciona tus intereses personales') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
