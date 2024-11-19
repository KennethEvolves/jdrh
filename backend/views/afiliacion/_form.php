<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Afiliacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="afiliacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_afiliacion')->textInput(['maxlength' => true]) ->label('opciones si no')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
