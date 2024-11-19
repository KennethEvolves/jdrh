<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Tiempo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tiempo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tiempo_llegada')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
