<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\TipoSangre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tipo-sangre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_sangre')->textInput(['maxlength' => true])->label('Tipo de sangre') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
