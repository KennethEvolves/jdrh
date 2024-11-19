<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Adicciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="adicciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_adicciones')->textInput(['maxlength' => true])->label('Adicción(Alcoholismo,Drogadicción,Videojuegos)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
