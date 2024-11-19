<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Salud $model */

$this->title = $model->id_salud;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_salud' => $model->id_salud], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_salud' => $model->id_salud], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_salud',
            'tratamiento_medico',
            'tipo_sangre_id_tipoSangre',
            'id_frecuenciaDentista',
            'id_tratamientoPsicologico',
            'id_servicioSalud',
            'id_alergias',
            'id_tratamientoPsiquiatrico',
            'id_problemasUltimoSemestre',
            'id_frecuenciaMedico',
            'id_usoAnteojos',
            'id_vacunas',
            'id_afiliacionEscuela',
            'id_comiteEN',
        ],
    ]) ?>

</div>
