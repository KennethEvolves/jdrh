<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Perfil $model */

$this->title = 'Perfil: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view container mt-3">

    <div class="header-section text-start mb-8">
        <!-- Título alineado a la izquierda -->
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <!-- Subtítulo con estilo más delgado -->
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;"><?= Html::encode('Detalles del Perfil') ?></h2>
    </div>

    <!-- Botones de acción (Generar PDF, Actualizar, Eliminar) en una sola fila -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF', // Icono para PDF
            ['perfil/viewpdf', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Generar PDF del Perfil',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>
        
        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3', // Botón pequeño
                'title' => 'Actualizar Perfil',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4', // Botón pequeño
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Perfil',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles del perfil -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover', // Ajuste de clases
            ],
            'attributes' => [
                [
                    'attribute' => 'userLink',
                    'label' => 'Usuario',
                    'format' => 'raw',
                ],
                [
                    'attribute' => 'id',
                    'label' => 'ID de Perfil',
                ],
                'nombre:ntext',
                'apellido:ntext',
                'fecha_nacimiento',
                'genero.genero_nombre',
                'telefono',
                'domicilio',
                'correo_personal',
                'correo_institucional',
                'curp',
                'tel_emerg_principal',
                'ciudad_nacimiento',
                'estado_nacimiento',
                'pagina_web',
                'created_at',
                'updated_at',
                [
                    'attribute' => 'maya_hablante',
                    'label' => 'Maya Hablante',
                    'value' => $model->maya_hablante ? 'Sí' : 'No',
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