<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\PeriodoSemestral;
use backend\models\Generaciones;
use backend\models\Grupo;
use backend\models\User;
/** @var yii\web\View $this */
/** @var backend\models\Expediente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'id_tutor')->textInput() ?> -->

    <?=  $form->field($model,  'id_tutor')->dropDownList($model->TutoresPerfil,
    [  'prompt'  =>  'Por  Favor  Elija  Uno'  ]);?>
<!-- 
    <?= $form->field($model, 'id_generacion')->textInput() ?> -->
    <?= $form->field($model, 'id_generacion')->dropDownList(
                    ArrayHelper::map(Generaciones::find()->all(),'id_generacion','nombre')) ?>

    <!-- <?= $form->field($model, 'id_grupocreado')->textInput() ?> -->
    <?= $form->field($model, 'id_grupocreado')->dropDownList(
                    ArrayHelper::map(Grupo::find()->all(),'id_grupocreado','nombre')) ?>

    <?= $form->field($model, 'fecha_elaboracion')->textInput() ?>

    <?= $form->field($model, 'fecha_actualizacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
