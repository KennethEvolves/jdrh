<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Organizacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="organizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_organizacion')->textInput(['maxlength' => true])->label('Tipo de Organización(Social,religiosa,politica)')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
