<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Transporte $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_transporte')->textInput(['maxlength' => true])->label('Tipo de transportes') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
