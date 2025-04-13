<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\InformacionPersonalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="informacion-personal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="mb-3">
        <?= $form->field($model, 'inf_personal_id')->textInput(['placeholder' => 'ID de Información Personal']) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'fk_licenciatura')->textInput(['placeholder' => 'Licenciatura']) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'fk_ciclo_escolar')->textInput(['placeholder' => 'Ciclo Escolar']) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'primera_opcion')->textInput(['placeholder' => 'Primera Opción']) ?>
    </div>

    <div class="mb-3">
        <?= $form->field($model, 'eleccion_definitiva')->textInput(['placeholder' => 'Elección Definitiva']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Restablecer', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
