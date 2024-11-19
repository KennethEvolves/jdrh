<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\FrecuenciaConsumoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="frecuencia-consumo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_frecuenciaConsumo') ?>

    <?= $form->field($model, 'tipo_alimento') ?>

    <?= $form->field($model, 'id_escala') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
