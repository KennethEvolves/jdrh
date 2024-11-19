<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\TratamientoPsiquiatricoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tratamiento-psiquiatrico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tratamientoPsiquiatrico') ?>

    <?= $form->field($model, 'tipo_psiquiatra') ?>

    <?= $form->field($model, 'tipo_tiempo') ?>

    <?= $form->field($model, 'tipo_lugar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
