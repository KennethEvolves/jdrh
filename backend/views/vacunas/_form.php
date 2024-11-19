<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Vacunas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vacunas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_vacunas')->textInput(['maxlength' => true])->label('Tipo de vacuna(influenza, covid)')?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
