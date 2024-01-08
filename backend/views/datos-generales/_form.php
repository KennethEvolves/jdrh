<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DatosGenerales $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-generales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'licenciatura')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'generacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupcion_padre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion_madre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugar_nacimiento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
