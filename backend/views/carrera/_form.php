<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\editors\Summernote;
use Itstructure\CKEditor\CKEditor;


/** @var yii\web\View $this */
/** @var backend\models\Carrera $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creditos')->textInput() ?>

    <?= $form->field($model, 'cred_serv_social')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?> 
    
   

    <?= $form->field($model, 'carreracol')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
