<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\PeriodoSemestralSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-semestral-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ciclo') ?>

    <?= $form->field($model, 'fecha_inicio') ?>

    <?= $form->field($model, 'fecha_fin') ?>

    <?= $form->field($model, 'periodo') ?>

    <?= $form->field($model, 'semanas') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
