<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Licenciaturas $model */

$this->title = 'Licenciatura: ' . $model->nombre_licenciatura;
$this->params['breadcrumbs'][] = ['label' => 'Licenciaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="licenciaturas-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles de la Licenciatura</h2>
    </div>

    <!-- Botones de acción (Actualizar, Eliminar, Generar PDF) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', // Icono para PDF
            ['licenciaturas/viewpdf', 'licenciatura_id' => $model->licenciatura_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Generar PDF de la Licenciatura',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>
        
        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'licenciatura_id' => $model->licenciatura_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Actualizar Licenciatura',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'licenciatura_id' => $model->licenciatura_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4', // Botón pequeño
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar esta licenciatura?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Licenciatura',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles de la licenciatura -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover', // Ajuste de clases
            ],
            'attributes' => [
                [
                    'attribute' => 'licenciatura_id',
                    'label' => 'ID de Licenciatura',
                ],
                'nombre_licenciatura:ntext',
                'desc_licenciatura:ntext',
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
