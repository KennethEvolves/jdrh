<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\DatosGenerales $model */

$this->title = $model->iddatos_generales;
$this->params['breadcrumbs'][] = ['label' => 'Datos Generales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datos-generales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddatos_generales' => $model->iddatos_generales], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddatos_generales' => $model->iddatos_generales], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddatos_generales',
            'licenciatura:ntext',
            'generacion',
            'id_expediente',
            'capacitacion_previa',
            'talleres_interes',
            'tiempo_formacionIntegral',
            'aspectos_sobresalientesEscuela',
            'areas_oportunidadEscuela',
            'preparatoria',
            'estudios_adicionales',
            'primera_opcion_licenciatura',
            'cursas_eleccionLicenciatura',
            'posible_licenciaturaGusto',
            'proyectoVida_cincoAños',
            'proyectoVida_diezAños',
            'actividad_extracurricular',
            'observaciones_sugerencias',
            'tiempo_estudio',
            'id_motivosEstudioLicenciatura',
        ],
    ]) ?>

</div>
