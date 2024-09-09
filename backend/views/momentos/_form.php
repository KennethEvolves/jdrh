<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\UnidadEstudio;

/** @var yii\web\View $this */
/** @var backend\models\Momentos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="momentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtemas')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_aprendizaje')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'act_ensenanza')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sugerencia_evaluacion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fuentes_aprendizaje')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'unidad_estudio_id_unidad')->textInput() ?> -->

    <?= $form->field($model, 'unidad_estudio_id_unidad')->dropDownList(
                    ArrayHelper::map(UnidadEstudio::find()->all(),'id_unidad','nombre_asignatura'));?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
