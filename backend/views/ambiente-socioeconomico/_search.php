<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\AmbienteSocioeconomicoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ambiente-socioeconomico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ambienteSocioeconomico') ?>

    <?= $form->field($model, 'vivienda_padres') ?>

    <?= $form->field($model, 'id_servicios') ?>

    <?= $form->field($model, 'id_usoPersonal') ?>

    <?= $form->field($model, 'id_transporte') ?>

    <?php // echo $form->field($model, 'id_tiempo') ?>

    <?php // echo $form->field($model, 'id_vivienda') ?>

    <?php // echo $form->field($model, 'id_bienes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
