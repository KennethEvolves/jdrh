<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ProblemasUltimoSemestre $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="problemas-ultimo-semestre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiene_problema')->textInput(['maxlength' => true])->label('Durante el ultimo semestre ¿has tenido algun roblema de salud?')?>

    <?= $form->field($model, 'tipo_problema')->textInput(['maxlength' => true]) ->label('Especificar')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
