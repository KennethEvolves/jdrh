<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\InteresesPersonales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="intereses-personales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_interesesPersonales')->textInput(['maxlength' => true])->label('Interes personales(Leer, Jugar, Musica, ir al cine)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
