<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MotivosEstudioLicenciatura $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="motivos-estudio-licenciatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_motivosEstudioLicenciatura')->textInput() ?>

    <?= $form->field($model, 'motivos')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
