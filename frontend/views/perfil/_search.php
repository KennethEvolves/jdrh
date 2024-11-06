<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\search\PerfilSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'fecha_nacimiento') ?>

    <?= $form->field($model, 'domicilio') ?>
    <?= $form->field($model, 'correo_personal') ?>
    <?= $form->field($model, 'correo_institucional') ?>
    <?= $form->field($model, 'curp') ?>
    <?= $form->field($model, 'numero_contactoEmergencia') ?>
    <?= $form->field($model, 'maya_hablante') ?>
    <?= $form->field($model, 'ciudad_nacimiento') ?>
    <?= $form->field($model, 'estado_nacimiento') ?>

    <?php // echo $form->field($model, 'genero_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
