<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\PlanEstudiosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="plan-estudios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_plan') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'fecha_autorizacion') ?>

    <?= $form->field($model, 'vigencia') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'carrera_id_carrera') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
