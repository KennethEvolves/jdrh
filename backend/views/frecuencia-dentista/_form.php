<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaDentista $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="frecuencia-dentista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'frecuencia')->textInput(['maxlength' => true])->label('frecuencia al dentisa')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
