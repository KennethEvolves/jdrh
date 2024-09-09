<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosFamiliaresSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="datos-familiares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddatos_familiares') ?>

    <?= $form->field($model, 'estado_civil') ?>

    <?= $form->field($model, 'numero_hijos') ?>

    <?= $form->field($model, 'edades_hijos') ?>

    <?= $form->field($model, 'tipo_beca') ?>

    <?php // echo $form->field($model, 'dependencia_economica') ?>

    <?php // echo $form->field($model, 'dependientes_economico') ?>

    <?php // echo $form->field($model, 'empresa_trabajas') ?>

    <?php // echo $form->field($model, 'puesto_trabajas') ?>

    <?php // echo $form->field($model, 'horario_trabajas') ?>

    <?php // echo $form->field($model, 'id_civill') ?>

    <?php // echo $form->field($model, 'id_tiposbeca') ?>

    <?php // echo $form->field($model, 'id_familiares') ?>

    <?php // echo $form->field($model, 'id_tipo_dependientes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
