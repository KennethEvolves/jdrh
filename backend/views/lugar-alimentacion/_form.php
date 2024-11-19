<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\EscalaConsumo;

/** @var yii\web\View $this */
/** @var backend\models\LugarAlimentacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lugar-alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_lugar')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
