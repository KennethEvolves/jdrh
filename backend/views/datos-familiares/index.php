<?php

use backend\models\DatosFamiliares;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\DatosFamiliaresSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Datos Familiares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-familiares-index container mt-5">

    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los datos familiares registrados</p>
    </div>

    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Datos Familiares', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',
            'title' => 'Haz clic para agregar un nuevo registro de datos familiares',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;', // Estilo sutil
        ]) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'fk_estado_civil',
                'label' => 'Estado Civil',
                'value' => function ($model) {
                    // Aquí accedes al nombre del estado civil relacionado
                    return $model->fkEstadoCivil ? $model->fkEstadoCivil->nombre_estado_civil : 'No definido';
                },
                'contentOptions' => ['class' => 'text-center'], // Centrar el contenido
            ],
            [
                'attribute' => 'padre_nombre',
                'label' => 'Nombre del Padre',
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'madre_nombre',
                'label' => 'Nombre de la Madre',
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'class' => 'yii\grid\Column',
                'header' => 'Detalles',
                'content' => function ($model) {
                    return Html::button(
                        'Ver',
                        [
                            'class' => 'btn btn-outline-primary btn-sm',
                            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',
                            'data-bs-toggle' => 'modal',
                            'data-bs-target' => '#modal-' . $model->id_datosFamiliares,
                        ]
                    );
                },
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DatosFamiliares $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_datosFamiliares' => $model->id_datosFamiliares]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>

    <?php foreach ($dataProvider->models as $model): ?>
        <div class="modal fade" id="modal-<?= $model->id_datosFamiliares ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $model->id_datosFamiliares ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-<?= $model->id_datosFamiliares ?>">Detalles de Datos Familiares</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Estado Civil:</strong> <?= $model->fkEstadoCivil->nombre_estado_civil ?></p>
                        <p><strong>Padre:</strong> <?= $model->padre_nombre . ' ' . $model->padre_apellido ?> (<?= $model->padre_ocupacion ?>)</p>
                        <p><strong>Fecha de Nacimiento del Padre:</strong> <?= $model->padre_fecha_nacimiento ?></p>
                        <p><strong>Madre:</strong> <?= $model->madre_nombre . ' ' . $model->madre_apellido ?> (<?= $model->madre_ocupacion ?>)</p>
                        <p><strong>Fecha de Nacimiento de la Madre:</strong> <?= $model->madre_fecha_nacimiento ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
