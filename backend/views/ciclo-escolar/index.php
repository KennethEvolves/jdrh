<?php

use backend\models\CicloEscolar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\CicloEscolarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ciclo Escolar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclo-escolar-index container mt-5">

    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los ciclos escolares registrados</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Ciclo Escolar', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar un nuevo ciclo escolar',
            'aria-label' => 'Agregar Ciclo Escolar',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'], // Usar clases de Bootstrap para la tabla
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'ciclo_escolar_id',
                'label' => 'ID',
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido de la columna
            ],
            'nombre_ciclo_escolar',
            [
                'attribute' => 'año_inicio',
                'label' => 'Año de Inicio',
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido
            ],
            [
                'attribute' => 'año_fin',
                'label' => 'Año de Fin',
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CicloEscolar $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ciclo_escolar_id' => $model->ciclo_escolar_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
