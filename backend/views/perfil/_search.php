<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Perfil;

/** @var yii\web\View $this */
/** @var backend\models\search\PerfilSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="perfil-search container mt-5 p-4 border rounded shadow-sm bg-light">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'nombre')->textInput([
                'placeholder' => 'Nombre',
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'apellido')->textInput([
                'placeholder' => 'Apellido',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'fecha_nacimiento')->textInput([
                'type' => 'date',
                'class' => 'form-control',
                'placeholder' => 'Fecha de nacimiento'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'genero_id')->dropDownList(Perfil::getGeneroLista(), [
                'prompt' => 'Por Favor Elija Uno',
                'class' => 'form-select'
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'telefono')->textInput([
                'placeholder' => 'Teléfono',
                'class' => 'form-control'
            ]) ?>
        </div>
        <div class="col-md-6 mb-3">
            <?= $form->field($model, 'pagina_web')->textInput([
                'maxlength' => 255,
                'placeholder' => 'Página web',
                'class' => 'form-control'
            ]) ?>
        </div>
    </div>

    <div class="form-group text-center mt-4">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary btn-sm',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-outline-secondary btn-sm',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
