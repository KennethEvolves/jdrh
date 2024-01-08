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

    <?= $form->field($model, 'nombre_padre') ?>

    <?= $form->field($model, 'ocupcion_padre') ?>

    <?php // echo $form->field($model, 'nombre_madre') ?>

    <?php // echo $form->field($model, 'ocupacion_madre') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'lugar_nacimiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
