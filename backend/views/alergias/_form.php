<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Alergias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alergias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_alergias')->textInput(['maxlength' => true])->label('alergias') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
