<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_lugarAlimentacion')->textInput()->label('¿Dónde acostumbras comer?')//casa,escuela,trabajo,calle,otro ?>

    <?= $form->field($model, 'id_frecuenciaConsumo')->textInput()->label('¿Con qué frecuencia consumes estos alimentos?') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
