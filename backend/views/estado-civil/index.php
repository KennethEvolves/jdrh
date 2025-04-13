<?php

use backend\models\EstadoCivil;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\EstadoCivilSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Estado Civil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-civil-index container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los estados civiles registrados</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Crear Estado Civil', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar un nuevo estado civil',
            'aria-label' => 'Crear Estado Civil',
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
                'attribute' => 'estado_civil_id',
                'label' => 'ID',
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido de la columna
            ],
            'nombre_estado_civil',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, EstadoCivil $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'estado_civil_id' => $model->estado_civil_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
