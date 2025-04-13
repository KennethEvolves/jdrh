<?php

use backend\models\OptMotivosEstudio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\OptMotivosEstudioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Motivos de Estudio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opt-motivos-estudio-index container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los motivos de estudio registrados</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Motivo de Estudio', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar un nuevo motivo de estudio',
            'aria-label' => 'Agregar Motivo de Estudio',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'], // Usar clases de Bootstrap para la tabla
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'motivo_id',
            'nombre_motivo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OptMotivosEstudio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'motivo_id' => $model->motivo_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
