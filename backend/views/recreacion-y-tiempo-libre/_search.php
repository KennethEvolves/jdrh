<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\RecreacionYTiempoLibreSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="recreacion-ytiempo-libre-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_recreacionTiempoLibre') ?>

    <?= $form->field($model, 'uso_internet') ?>

    <?= $form->field($model, 'acceso_internet') ?>

    <?= $form->field($model, 'cuestionamiento_usoInternet') ?>

    <?= $form->field($model, 'areasInteres') ?>

    <?php // echo $form->field($model, 'id_lugarAcceso') ?>

    <?php // echo $form->field($model, 'id_participacionOrganizacion') ?>

    <?php // echo $form->field($model, 'id_interesesPersonales') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
