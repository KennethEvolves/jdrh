<?php

use backend\models\InformacionPersonal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\InformacionPersonalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Información Personal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-personal-index container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los registros de información personal</p>
    </div>

    <!-- Botón pequeño alineado a la izquierda, arriba de la tabla -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Información Personal', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',  // Botón pequeño con borde
            'title' => 'Haz clic para agregar un nuevo registro de información personal',
            'aria-label' => 'Agregar Información Personal',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',  // Estilo sutil
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'], // Usar clases de Bootstrap para la tabla
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inf_personal_id',
            [
                'attribute' => 'fk_licenciatura',
                'label' => 'Licenciatura',
                'value' => function ($model) {
                    return $model->fkLicenciatura ? $model->fkLicenciatura->nombre_licenciatura : 'N/A';
                }
            ],
            [
                'attribute' => 'fk_ciclo_escolar',
                'label' => 'Ciclo Escolar',
                'value' => function ($model) {
                    return $model->fkCicloEscolar ? $model->fkCicloEscolar->nombre_ciclo_escolar : 'N/A';
                }
            ],
            [
                'attribute' => 'primera_opcion',
                'label' => 'Primera Opción',
                'value' => function ($model) {
                    return $model->primera_opcion ? 'Sí' : 'No';
                }
            ],
            [
                'attribute' => 'eleccion_definitiva',
                'label' => 'Elección Definitiva',
                'value' => function ($model) {
                    return $model->eleccion_definitiva ? 'Sí' : 'No';
                }
            ],
            'otra_licenciatura:ntext',
            'proyecto_5_anios:ntext',
            'proyecto_10_anios:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InformacionPersonal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'inf_personal_id' => $model->inf_personal_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'], // Centrar las acciones
            ],
        ],
    ]); ?>

</div>
