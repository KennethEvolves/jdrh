<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\UsoAnteojos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="uso-anteojos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uso')->textInput(['maxlength' => true]) ->label('¿Necesitas o usas anteojos?') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
