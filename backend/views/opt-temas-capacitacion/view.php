<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\OptTemasCapacitacion $model */

$this->title = 'Tema de Capacitación: ' . $model->nombre_tema;
$this->params['breadcrumbs'][] = ['label' => 'Temas de Capacitación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="opt-temas-capacitacion-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles del Tema de Capacitación</h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF',
            ['viewpdf', 'tema_id' => $model->tema_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF del Tema de Capacitación',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'tema_id' => $model->tema_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Tema de Capacitación',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'tema_id' => $model->tema_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Tema de Capacitación',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del tema -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                [
                    'attribute' => 'tema_id',
                    'label' => 'ID del Tema',
                ],
                [
                    'attribute' => 'nombre_tema',
                    'label' => 'Nombre del Tema',
                ],
                // Añade otros atributos relevantes aquí
            ],
        ]) ?>
    </div>

</div>

<style>
/* Estilo similar al módulo de perfil */
.table-bordered th, .table-bordered td {
    border: 1px solid #e0e0e0;
    padding: 8px;
}

.table-striped tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

.table th {
    font-weight: 400;
    background-color: #f8f9fa;
}
</style>
