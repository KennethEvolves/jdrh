<?php

use backend\models\OptTalleresInteres;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\OptTalleresInteresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Talleres de Interés';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opt-talleres-interes-index container mt-5">

    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los talleres de interés registrados</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Taller de Interés', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar un nuevo taller de interés',
            'aria-label' => 'Agregar Taller de Interés',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'], // Usar clases de Bootstrap para la tabla
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'taller_id',
            'nombre_taller',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OptTalleresInteres $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'taller_id' => $model->taller_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
