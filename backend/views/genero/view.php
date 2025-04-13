<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Genero $model */

$this->title = 'Género: ' . $model->genero_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="genero-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles del Género</h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF',
            ['genero/viewpdf', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF del Género',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Género',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este género?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Género',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del género -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                [
                    'attribute' => 'id',
                    'label' => 'ID del Género',
                ],
                [
                    'attribute' => 'genero_nombre',
                    'label' => 'Nombre del Género',
                ],
            ],
        ]) ?>
    </div>

</div>

<style>
/* Reduce el tamaño de los bordes */
.table-bordered th, .table-bordered td {
    border: 1px solid #e0e0e0;
    padding: 8px;
}

/* Color de fondo alternado para filas */
.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Menos contraste en el encabezado */
.table th {
    font-weight: 400;
    background-color: #f8f9fa;
}
</style>
