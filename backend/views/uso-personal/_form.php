<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\UsoPersonal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="uso-personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_usoPersonal')->textInput(['maxlength' => true])->label('Equipos de uso personal(computadora, telefono, etc)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
