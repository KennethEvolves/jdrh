<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\InformacionAcademica $model */

$this->title = 'Información Académica: ' . $model->inf_academica_id;
$this->params['breadcrumbs'][] = ['label' => 'Información Académica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacion-academica-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles de la Información Académica</h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', // Icono para PDF
            ['informacion-academica/viewpdf', 'inf_academica_id' => $model->inf_academica_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Generar PDF de la Información Académica',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>
        
        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'inf_academica_id' => $model->inf_academica_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Actualizar Información Académica',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'inf_academica_id' => $model->inf_academica_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4', // Botón pequeño
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Información Académica',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles de la Información Académica -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover', // Ajuste de clases
            ],
            'attributes' => [
                [
                    'attribute' => 'inf_academica_id',
                    'label' => 'ID de Información Académica',
                ],
                [
                    'attribute' => 'estudio_adicional',
                    'label' => 'Estudio Adicional',
                ],
                [
                    'attribute' => 'horas_estudio_diario',
                    'label' => 'Horas de Estudio Diario',
                ],
                [
                    'attribute' => 'actividad_extraescolar',
                    'label' => 'Actividad Extraescolar',
                ],
                [
                    'label' => 'Motivos de Estudio',
                    'value' => $model->motivosEstudios ? implode(', ', array_map(fn($motivo) => Html::encode($motivo->nombre_motivo), $model->motivosEstudios)) : 'No se seleccionaron motivos de estudio',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Temas de Capacitación',
                    'value' => $model->temasCapacitaciones ? implode(', ', array_map(fn($tema) => Html::encode($tema->nombre_tema), $model->temasCapacitaciones)) : 'No se seleccionaron temas de capacitación',
                    'format' => 'raw',
                ],
                [
                    'label' => 'Talleres de Interés',
                    'value' => $model->talleresInteres ? implode(', ', array_map(fn($taller) => Html::encode($taller->nombre_taller), $model->talleresInteres)) : 'No se seleccionaron talleres de interés',
                    'format' => 'raw',
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
