<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\MomentosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="momentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_momento') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'subtemas') ?>

    <?= $form->field($model, 'act_aprendizaje') ?>

    <?= $form->field($model, 'act_ensenanza') ?>

    <?php // echo $form->field($model, 'sugerencia_evaluacion') ?>

    <?php // echo $form->field($model, 'fuentes_aprendizaje') ?>

    <?php // echo $form->field($model, 'unidad_estudio_id_unidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
