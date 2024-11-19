<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\EscalaConsumo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="escala-consumo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion_frecuencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_escala')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
