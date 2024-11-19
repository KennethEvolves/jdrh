<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Vivienda;
use backend\models\Bienes;
use backend\models\Tiempo;
use backend\models\Transporte;
use backend\models\UsoPersonal;
use backend\models\Servicios;

/** @var yii\web\View $this */
/** @var backend\models\AmbienteSocioeconomico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ambiente-socioeconomico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vivienda_padres')->textInput() ->label('¿Vives en casa de tus padres?')?>

    <?= $form->field($model, 'id_servicios')->dropDownList(
                    ArrayHelper::map(Servicios::find()->all(),'id_servicios','tipo_servicios'),['prompt' => 'Selecciona una opción...'])->label('¿Con qué servicios cuentas?') //servicios:luz,agua,etc?>

    <?= $form->field($model, 'id_usoPersonal')->dropDownList(
                    ArrayHelper::map(UsoPersonal::find()->all(),'id_usoPersonal','tipo_usoPersonal'),['prompt' => 'Selecciona una opción...'])->label('Para tu uso personal cuentas con:') ?>

    <?= $form->field($model, 'id_transporte')->dropDownList(
                    ArrayHelper::map(Transporte::find()->all(),'id_transporte','tipo_transporte'),['prompt' => 'Selecciona una opción...'])->label('¿Cuál es el medio de transporte que utilizas para llegar a la escuela?')  ?>

    <?= $form->field($model, 'id_tiempo')->dropDownList(
                    ArrayHelper::map(Tiempo::find()->all(),'id_tiempo','tiempo_llegada'),['prompt' => 'Selecciona una opción...'])->label('En promedio, ¿cuánto tiempo haces en el recorrido de tu casa a la escuela?')  ?>
    
    <?= $form->field($model, 'id_vivienda')->dropDownList(
                    ArrayHelper::map(Vivienda::find()->all(),'id_vivienda','tipo_vivienda'),['prompt' => 'Selecciona una opción...']) ->label('La casa donde vives es:');?>

    <?= $form->field($model, 'id_bienes')->dropDownList(
                    ArrayHelper::map(Bienes::find()->all(), 'id_bienes', 'tipos_bienes'),['prompt' => 'Selecciona una opción...'])->label('¿Cuentas con estos bienes?'); ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
