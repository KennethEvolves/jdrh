<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\EstadoCivil $model */

$this->title = 'Estado Civil: ' . $model->nombre_estado_civil;
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="estado-civil-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles del Estado Civil</h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', // Icono para PDF
            ['estado-civil/viewpdf', 'estado_civil_id' => $model->estado_civil_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Generar PDF del Estado Civil',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'estado_civil_id' => $model->estado_civil_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Actualizar Estado Civil',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'estado_civil_id' => $model->estado_civil_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4', // Botón pequeño
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Estado Civil',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del estado civil -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover', // Ajuste de clases
            ],
            'attributes' => [
                [
                    'attribute' => 'estado_civil_id',
                    'label' => 'ID del Estado Civil',
                ],
                [
                    'attribute' => 'nombre_estado_civil',
                    'label' => 'Nombre',
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
