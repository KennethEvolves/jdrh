<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\ProblemasUltimoSemestreSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="problemas-ultimo-semestre-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_problemasUltimoSemestre') ?>

    <?= $form->field($model, 'tiene_problema') ?>

    <?= $form->field($model, 'tipo_problema') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
