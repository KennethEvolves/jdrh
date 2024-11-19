<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Comiteen $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comiteen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_comiteEN')->textInput(['maxlength' => true])->label('Que tipo de comite (salud integral,instituciona de genero, no pertence)') ?>

    <div class="form-group">
        <?= Html::submitButton('Guadar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
