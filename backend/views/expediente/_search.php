<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\ExpedienteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expediente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idexpediente') ?>

    <?= $form->field($model, 'id_tutor') ?>

    <?= $form->field($model, 'id_generacion') ?>

    <?= $form->field($model, 'id_grupocreado') ?>

    <?= $form->field($model, 'fecha_elaboracion') ?>

    <?php // echo $form->field($model, 'fecha_actualizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
