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

    <?php
    function createStyledFormInput($form, $model, $attribute, $options = []) {
        $defaultOptions = [
            'labelOptions' => ['class' => 'form-label fw-bold text-primary'],
            'inputOptions' => ['class' => 'form-control']
        ];
    
        $options = array_merge($defaultOptions, $options);
    
        return $form->field($model, $attribute, $options)->textInput();
    }
    ?>

    <?= createStyledFormInput($form, $model, 'nombre') ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'apellido') ?>
    <br/>

    <?php  echo  $form->field($model,'fecha_nacimiento')->widget(DatePicker::className(),[
                                                                        'dateFormat'  =>  'yyyy-MM-dd',
                                                                        'clientOptions'  =>  [
                                                                        'yearRange'  =>  '-115:+0',
                                                                        'changeYear'  =>  true],
                                                                        'class' => 'form-control'
                                                        ])  ?>
    <br/>

    

    <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Seleccione uno' ]);?>
    <br/>

    <!-- Agrega el campo 'telefono' -->
    <?= createStyledFormInput($form, $model, 'telefono') ?>
    <br/>

    <!-- Agrega el campo 'pagina_web' -->
    <?= createStyledFormInput($form, $model, 'pagina_web') ?>
    <br/>

    <!-- Agrega el campo 'domicilio' -->
    <?= createStyledFormInput($form, $model, 'domicilio') ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'correo_personal') ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'correo_institucional') ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'curp') ?>
    <br/> 

    <?= createStyledFormInput($form, $model, 'tel_emerg_principal') ?>
    <br/>

    <?= $form->field($model, 'maya_hablante')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'ciudad_nacimiento') ?>
    <br/>

    <?= createStyledFormInput($form, $model, 'estado_nacimiento') ?>
    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
