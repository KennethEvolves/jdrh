<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-familiares-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado_civil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_hijos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edades_hijos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_beca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dependencia_economica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dependientes_economico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'empresa_trabajas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'puesto_trabajas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_trabajas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_civill')->textInput() ?>

    <?= $form->field($model, 'id_tiposbeca')->textInput() ?>

    <?= $form->field($model, 'id_familiares')->textInput() ?>

    <?= $form->field($model, 'id_tipo_dependientes')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
