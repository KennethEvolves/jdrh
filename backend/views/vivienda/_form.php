<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Vivienda $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vivienda-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_vivienda')->textInput(['maxlength' => true])->label('La vivienda es: propia, rentada, prestada, otro, especificar') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
