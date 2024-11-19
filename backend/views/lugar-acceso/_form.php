<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\LugarAcceso $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lugar-acceso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_acceso')->textInput(['maxlength' => true])->label('Lugar de acceso(Casa, calle, biblioteca')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
