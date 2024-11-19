<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\AlimentacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alimentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alimentacion') ?>

    <?= $form->field($model, 'id_lugarAlimentacion') ?>

    <?= $form->field($model, 'id_frecuenciaConsumo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
