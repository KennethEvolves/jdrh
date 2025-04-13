<?php

use backend\models\InformacionAcademica;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\search\InformacionAcademicaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Información Académica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-academica-index container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los registros de información académica</p>
    </div>

    <!-- Button to Add New Information -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Información Académica', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',
            'title' => 'Haz clic para agregar un nuevo registro de información académica',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;', // Estilo sutil
        ]) ?>
    </div>

    <!-- GridView Section -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'inf_academica_id',
            'estudio_adicional',
            'horas_estudio_diario',
            'actividad_extraescolar',
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
                            'data-bs-target' => '#modal-' . $model->inf_academica_id,
                        ]
                    );
                },
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InformacionAcademica $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'inf_academica_id' => $model->inf_academica_id]);
                },
                'header' => 'Acciones',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
        ],
    ]); ?>

    <?php foreach ($dataProvider->models as $model): ?>
        <div class="modal fade" id="modal-<?= $model->inf_academica_id ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $model->inf_academica_id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-<?= $model->inf_academica_id ?>">Detalles de Información Académica</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Estudio Adicional:</strong> <?= $model->estudio_adicional ?></p>
                        <p><strong>Horas de Estudio Diario:</strong> <?= $model->horas_estudio_diario ?></p>
                        <p><strong>Actividad Extraescolar:</strong> <?= $model->actividad_extraescolar ?></p>

                        <!-- Mostrar Motivos de Estudio -->
                        <div class="mt-4">
                            <h5><strong>Motivos de Estudio:</strong></h5>
                            <?php if ($model->motivosEstudios): ?>
                                <ul>
                                    <?php foreach ($model->motivosEstudios as $motivo): ?>
                                        <li><?= Html::encode($motivo->nombre_motivo) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No se seleccionaron motivos de estudio.</p>
                            <?php endif; ?>
                        </div>

                        <!-- Mostrar Temas de Capacitación -->
                        <div class="mt-4">
                            <h5><strong>Temas de Capacitación:</strong></h5>
                            <?php if ($model->temasCapacitaciones): ?>
                                <ul>
                                    <?php foreach ($model->temasCapacitaciones as $tema): ?>
                                        <li><?= Html::encode($tema->nombre_tema) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No se seleccionaron temas de capacitación.</p>
                            <?php endif; ?>
                        </div>

                        <!-- Mostrar Talleres de Interés -->
                        <div class="mt-4">
                            <h5><strong>Talleres de Interés:</strong></h5>
                            <?php if ($model->talleresInteres): ?>
                                <ul>
                                    <?php foreach ($model->talleresInteres as $taller): ?>
                                        <li><?= Html::encode($taller->nombre_taller) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p>No se seleccionaron talleres de interés.</p>
                            <?php endif; ?>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>
