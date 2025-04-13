<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OptMotivosEstudio $model */

$this->title = 'Motivo de Estudio: ' . $model->nombre_motivo;
$this->params['breadcrumbs'][] = ['label' => 'Motivos de Estudio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="opt-motivos-estudio-view container mt-5">

    <!-- Header Section -->
    <div class="header-section text-start mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;"><?= Html::encode('Detalles del Motivo de Estudio') ?></h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', 
            ['opt-motivos-estudio/viewpdf', 'motivo_id' => $model->motivo_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF del Motivo de Estudio',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'motivo_id' => $model->motivo_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Motivo de Estudio',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'motivo_id' => $model->motivo_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Motivo de Estudio',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del motivo de estudio -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                'motivo_id',
                'nombre_motivo',
                // Otros atributos del modelo pueden ser añadidos aquí
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
