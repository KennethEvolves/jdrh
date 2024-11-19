<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EscalaConsumo;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaConsumo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="frecuencia-consumo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_alimento')->textInput(['maxlength' => true])->label('Alimento') ?>
    
    <?= $form->field($model, 'id_escala')->dropDownList(
                    ArrayHelper::map(EscalaConsumo::find()->all(),'id_escala','descripcion_frecuencia'),['prompt' => 'Selecciona una opción...']) ->label('Escala de consumo de este alimento:') ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
