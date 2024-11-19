<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\SaludSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_salud') ?>

    <?= $form->field($model, 'tratamiento_medico') ?>

    <?= $form->field($model, 'tipo_sangre_id_tipoSangre') ?>

    <?= $form->field($model, 'id_frecuenciaDentista') ?>

    <?= $form->field($model, 'id_tratamientoPsicologico') ?>

    <?php // echo $form->field($model, 'id_servicioSalud') ?>

    <?php // echo $form->field($model, 'id_alergias') ?>

    <?php // echo $form->field($model, 'id_tratamientoPsiquiatrico') ?>

    <?php // echo $form->field($model, 'id_problemasUltimoSemestre') ?>

    <?php // echo $form->field($model, 'id_frecuenciaMedico') ?>

    <?php // echo $form->field($model, 'id_usoAnteojos') ?>

    <?php // echo $form->field($model, 'id_vacunas') ?>

    <?php // echo $form->field($model, 'id_afiliacionEscuela') ?>

    <?php // echo $form->field($model, 'id_comiteEN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
