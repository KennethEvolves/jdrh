<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\PercepcionInstitucion $model */

$this->title = 'Percepción Institucional: ' . $model->per_inst_id;
$this->params['breadcrumbs'][] = ['label' => 'Percepción Institucional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="percepcion-institucion-view container mt-5">

    <!-- Header Section -->
    <div class="header-section text-start mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;"><?= Html::encode('Detalles de la Percepción Institucional') ?></h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', 
            ['percepcion-institucion/viewpdf', 'per_inst_id' => $model->per_inst_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF de la Percepción Institucional',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'per_inst_id' => $model->per_inst_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Percepción Institucional',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'per_inst_id' => $model->per_inst_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Percepción Institucional',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles de la Percepción Institucional -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                [
                    'attribute' => 'per_inst_id',
                    'label' => 'ID de Percepción Institución',
                ],
                [
                    'attribute' => 'aspectos_positivos',
                    'label' => 'Aspectos Positivos',
                ],
                [
                    'attribute' => 'areas_oportunidad',
                    'label' => 'Áreas de Oportunidad',
                ],
                [
                    'attribute' => 'observaciones',
                    'label' => 'Observaciones',
                ],
            ],
        ]) ?>
    </div>

</div>

<style>
    /* Reduce el tamaño de los bordes */
    .table-bordered th, .table-bordered td {
        border: 1px solid #e0e0e0; /* Borde sutil */
        padding: 8px; /* Menos padding */
    }

    /* Color de fondo alternado para filas */
    .table-striped tbody tr:nth-child(odd) {
        background-color: #f9f9f9; /* Fondo sutil */
    }

    /* Menos contraste en el encabezado */
    .table th {
        font-weight: 400; /* Peso de fuente más ligero */
        background-color: #f8f9fa; /* Color de fondo sutil */
    }
</style>
