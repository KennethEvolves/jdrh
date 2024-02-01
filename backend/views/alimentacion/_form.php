<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idcomida')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
