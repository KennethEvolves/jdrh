<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\InformacionPersonal $model */

$this->title = 'Información Personal: ' . $model->inf_personal_id;
$this->params['breadcrumbs'][] = ['label' => 'Información Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="informacion-personal-view container mt-3">

    <!-- Sección de encabezado -->
    <div class="header-section text-start mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted" style="font-weight: 300;">Detalles de la Información Personal</h2>
    </div>

    <!-- Botones de acción -->
    <div class="d-flex justify-content-end mb-4">
        <!-- Botón para Generar PDF -->
        <?= Html::a(
            '<i class="fas fa-file-pdf mr-2"></i> Generar PDF',
            ['informacion-personal/viewpdf', 'inf_personal_id' => $model->inf_personal_id],
            [
                'class' => 'btn btn-outline-success btn-sm px-4 me-3',
                'title' => 'Generar PDF de la Información Personal',
                'aria-label' => 'Generar PDF',
                'target' => '_blank',
            ]
        ) ?>

        <!-- Botón para Actualizar -->
        <?= Html::a(
            'Actualizar',
            ['update', 'inf_personal_id' => $model->inf_personal_id],
            [
                'class' => 'btn btn-outline-primary btn-sm px-4 me-3',
                'title' => 'Actualizar Información Personal',
                'aria-label' => 'Actualizar'
            ]
        ) ?>

        <!-- Botón para Eliminar -->
        <?= Html::a(
            '<i class="fas fa-trash-alt mr-2"></i> Eliminar',
            ['delete', 'inf_personal_id' => $model->inf_personal_id],
            [
                'class' => 'btn btn-outline-danger btn-sm px-4',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este elemento?',
                    'method' => 'post',
                ],
                'title' => 'Eliminar Información Personal',
                'aria-label' => 'Eliminar'
            ]
        ) ?>
    </div>

    <!-- Detalles de la información personal -->
    <div class="detail-view-section mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'table table-sm table-bordered table-hover',
            ],
            'attributes' => [
                [
                    'attribute' => 'inf_personal_id',
                    'label' => 'ID de Información Personal',
                ],
                [
                    'attribute' => 'fk_licenciatura',
                    'label' => 'Licenciatura',
                    'value' => $model->fkLicenciatura ? $model->fkLicenciatura->nombre_licenciatura : 'N/A',
                ],
                [
                    'attribute' => 'fk_ciclo_escolar',
                    'label' => 'Ciclo Escolar',
                    'value' => $model->fkCicloEscolar ? $model->fkCicloEscolar->nombre_ciclo_escolar : 'N/A',
                ],
                [
                    'attribute' => 'primera_opcion',
                    'label' => 'Primera Opción',
                    'value' => $model->primera_opcion ? 'Sí' : 'No',
                ],
                [
                    'attribute' => 'eleccion_definitiva',
                    'label' => 'Elección Definitiva',
                    'value' => $model->eleccion_definitiva ? 'Sí' : 'No',
                ],
                [
                    'attribute' => 'otra_licenciatura',
                    'label' => 'Otra Licenciatura',
                ],
                [
                    'attribute' => 'proyecto_5_anios',
                    'label' => 'Proyecto a 5 Años',
                    'format' => 'ntext',
                ],
                [
                    'attribute' => 'proyecto_10_anios',
                    'label' => 'Proyecto a 10 Años',
                    'format' => 'ntext',
                ],
            ],
        ]) ?>
    </div>

</div>

<style>
/* Reducir el tamaño de los bordes */
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
