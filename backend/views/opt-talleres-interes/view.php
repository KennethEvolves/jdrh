<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OptTalleresInteres $model */

$this->title = 'Taller de Interés: ' . $model->nombre_taller;
$this->params['breadcrumbs'][] = ['label' => 'Talleres de Interés', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="opt-talleres-interes-view container mt-3">

    <!-- Header Section -->
    <div class="header-section text-start mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles del Taller de Interés</h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF',
            ['opt-talleres-interes/viewpdf', 'taller_id' => $model->taller_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF del Taller de Interés',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'taller_id' => $model->taller_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Taller de Interés',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'taller_id' => $model->taller_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Taller de Interés',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del taller de interés -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                [
                    'attribute' => 'taller_id',
                    'label' => 'ID del Taller',
                ],
                [
                    'attribute' => 'nombre_taller',
                    'label' => 'Nombre del Taller',
                ],
                // Puedes agregar más atributos si es necesario
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
