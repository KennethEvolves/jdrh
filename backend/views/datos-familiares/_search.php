<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosFamiliaresSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-familiares-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'id_datosFamiliares')->textInput([
                'placeholder' => 'ID de datos familiares',
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'fk_estado_civil')->textInput([
                'placeholder' => 'Estado Civil',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Nombre del padre',
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_apellido')->textInput([
                'maxlength' => true,
                'placeholder' => 'Apellido del padre',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'padre_ocupacion')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ocupación del padre',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::resetButton('Restablecer', ['class' => 'btn btn-outline-secondary btn-sm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
