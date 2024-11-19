<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Servicios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="servicios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_servicios')->textInput(['maxlength' => true])->label('Servicios(Agua, luz, etc)')  ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
