<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Carrera;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="plan-estudios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_autorizacion')->textInput() ?>

    <?= $form->field($model, 'vigencia')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

   <!--<?= $form->field($model, 'carrera_id_carrera')->textInput() ?>-->
   
   <?= $form->field($model, 'carrera_id_carrera')->dropDownList(
                    ArrayHelper::map(Carrera::find()->all(),'id_carrera','nombre'));?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
