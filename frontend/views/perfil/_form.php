<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use  yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Perfil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => 45]) ?>

    <?php  echo  $form->field($model,'fecha_nacimiento')->widget(DatePicker::className(),[
                                                                        'dateFormat'  =>  'yyyy-MM-dd',
                                                                        'clientOptions'  =>  [
                                                                        'yearRange'  =>  '-115:+0',
                                                                        'changeYear'  =>  true]
                                                        ])  ?>

    <!-- <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>
    * por favor use el formato YYYY-MM-DD -->

    <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Seleccione el genero' ]);?>

    <!-- Agrega el campo 'telefono' -->
    <?= $form->field($model, 'telefono')->textInput() ?>

    <!-- Agrega el campo 'pagina_web' -->
    <?= $form->field($model, 'pagina_web')->textInput(['maxlength' => 255]) ?>

    <!-- Agrega el campo 'domicilio' -->
    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'correo_personal')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'correo_institucional')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'curp')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'numero_contactoEmergencia')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'maya_hablante')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ciudad_nacimiento')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'estado_nacimiento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
