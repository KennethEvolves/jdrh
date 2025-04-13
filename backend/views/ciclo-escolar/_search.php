<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\CicloEscolarSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ciclo-escolar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ciclo_escolar_id') ?>

    <?= $form->field($model, 'nombre_ciclo_escolar') ?>

    <?= $form->field($model, 'año_inicio') ?>

    <?= $form->field($model, 'año_fin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
