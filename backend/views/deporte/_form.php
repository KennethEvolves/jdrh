<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Deporte $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="deporte-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_deporte')->textInput(['maxlength' => true])->label('Deporte: (Futbol, Basket, Tens)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
