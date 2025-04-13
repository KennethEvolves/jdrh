<?php

use backend\models\PercepcionInstitucion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\PercepcionInstitucionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Percepción Institucional';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percepcion-institucion-index container mt-5">

    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar las percepciones institucionales registradas</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Percepción Institucional', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar una nueva percepción institucional',
            'aria-label' => 'Agregar Percepción Institucional',
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
                'attribute' => 'per_inst_id',
                'label' => 'ID',
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido de la columna
            ],
            'aspectos_positivos:ntext',
            'areas_oportunidad:ntext',
            'observaciones:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PercepcionInstitucion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'per_inst_id' => $model->per_inst_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
