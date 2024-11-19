<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\HabitosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="habitos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_habitos') ?>

    <?= $form->field($model, 'habito_fumar') ?>

    <?= $form->field($model, 'num_cigarros') ?>

    <?= $form->field($model, 'habito_alcohol') ?>

    <?= $form->field($model, 'veces_semana') ?>

    <?php // echo $form->field($model, 'id_adicciones') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
