<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\AsignacionesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'grupo_id_grupo') ?>

    <?= $form->field($model, 'periodo_semestral_id_ciclo') ?>

    <?= $form->field($model, 'unidad_estudio_id_unidad') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
