<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */

$this->title = 'Datos Familiares: ' . $model->id_datosFamiliares;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datos-familiares-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;"><?= Html::encode('Detalles de los Datos Familiares') ?></h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', // Icono para PDF
            ['datos-familiares/viewpdf', 'id_datosFamiliares' => $model->id_datosFamiliares],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Generar PDF de Datos Familiares',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>
        
        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'id_datosFamiliares' => $model->id_datosFamiliares],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Actualizar Datos Familiares',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'id_datosFamiliares' => $model->id_datosFamiliares],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4', // Botón pequeño
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Datos Familiares',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles de los datos familiares -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-striped', // Ajuste de clases
            ],
            'attributes' => [
                [
                    'attribute' => 'id_datosFamiliares',
                    'label' => 'ID de Datos Familiares',
                ],
                [
                    'attribute' => 'fk_estado_civil',
                    'label' => 'Estado Civil',
                    'value' => function ($model) {
                        // Aquí accedes al nombre del estado civil relacionado
                        return $model->fkEstadoCivil ? $model->fkEstadoCivil->nombre_estado_civil : 'No definido';
                    },
                ],
                [
                    'attribute' => 'padre_nombre',
                    'label' => 'Nombre del Padre',
                ],
                [
                    'attribute' => 'padre_apellido',
                    'label' => 'Apellido del Padre',
                ],
                [
                    'attribute' => 'padre_ocupacion',
                    'label' => 'Ocupación del Padre',
                ],
                [
                    'attribute' => 'padre_fecha_nacimiento',
                    'label' => 'Fecha de Nacimiento del Padre',
                ],
                [
                    'attribute' => 'madre_nombre',
                    'label' => 'Nombre de la Madre',
                ],
                [
                    'attribute' => 'madre_apellido',
                    'label' => 'Apellido de la Madre',
                ],
                [
                    'attribute' => 'madre_ocupacion',
                    'label' => 'Ocupación de la Madre',
                ],
                [
                    'attribute' => 'madre_fecha_nacimiento',
                    'label' => 'Fecha de Nacimiento de la Madre',
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
