<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Bienes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bienes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipos_bienes')->textInput(['maxlength' => true])->label('Bienes (computadora, tablet, celular, etc)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
