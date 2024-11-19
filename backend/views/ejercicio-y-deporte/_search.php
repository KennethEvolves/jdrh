<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\EjercicioYDeporteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ejercicio-ydeporte-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ejercicioDeporte') ?>

    <?= $form->field($model, 'veces_ejercicio') ?>

    <?= $form->field($model, 'id_actividad') ?>

    <?= $form->field($model, 'id_deporte') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
