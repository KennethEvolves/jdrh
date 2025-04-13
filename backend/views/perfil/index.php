<?php

use frontend\models\Perfil;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Accordion;

/** @var yii\web\View $this */
/** @var backend\models\search\PerfilSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-index container mt-5">

    <!-- Header -->
    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <p class="h5 text-muted">Aquí puedes gestionar los perfiles registrados</p>
    </div>

    <!-- Agregar perfil -->
    <div class="mb-3 d-flex justify-content-start">
        <?= Html::a('Agregar Perfil', ['create'], [
            'class' => 'btn btn-outline-success btn-sm',
            'title' => 'Haz clic para agregar un nuevo perfil',
            'style' => 'font-size: 1rem; padding: 8px 16px; border-radius: 20px;',
        ]) ?>
    </div>

    <div class="row">
        <!-- Columna para el módulo de búsqueda a la izquierda (con tamaño reducido) -->
        <div class="col-md-4 mb-3">
            <?php echo Accordion::widget([
                'items' => [
                    [
                        'label' => 'Filtrar Perfiles',
                        'content' => $this->render('_search', ['model' => $searchModel]),
                        'contentOptions' => ['class' => 'p-3'],
                        'options' => ['class' => 'bg-light border rounded'],
                        'encodeLabels' => false,
                        'headerOptions' => [
                            'class' => 'accordion-button custom-accordion-button',
                        ],
                        'active' => false,
                    ],
                ]
            ]); ?>
        </div>

        <!-- Columna para la tabla, ocupando el resto del espacio -->
        <div class="col-md-8">
            <!-- Tabla de Perfiles -->
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'userLink',
                        'format' => 'raw',
                        'label' => 'Usuario',
                    ],
                    [
                        'attribute' => 'perfilIdLink',
                        'format' => 'raw',
                        'label' => 'Perfil',
                    ],
                    'nombre:ntext',
                    'apellido:ntext',
                    'fecha_nacimiento',
                    'correo_personal',
                    'correo_institucional',
                    'telefono',
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
                                    'data-bs-target' => '#modal-' . $model->id,
                                ]
                            );
                        },
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Perfil $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'header' => 'Acciones',
                        'headerOptions' => ['class' => 'text-center'],
                        'contentOptions' => ['class' => 'text-center'],
                    ],
                ],
            ]); ?>
        </div>
    </div>

    <?php foreach ($dataProvider->models as $model): ?>
        <!-- Modal de detalles del perfil -->
        <div class="modal fade" id="modal-<?= $model->id ?>" tabindex="-1" aria-labelledby="modalLabel-<?= $model->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-<?= $model->id ?>">Detalles del Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre:</strong> <?= $model->nombre . ' ' . $model->apellido ?></p>
                        <p><strong>Fecha de Nacimiento:</strong> <?= $model->fecha_nacimiento ?></p>
                        <p><strong>Teléfono:</strong> <?= $model->telefono ?></p>
                        <p><strong>Correo Personal:</strong> <?= $model->correo_personal ?></p>
                        <p><strong>Correo Institucional:</strong> <?= $model->correo_institucional ?></p>
                        <p><strong>Estado de Nacimiento:</strong> <?= $model->estado_nacimiento ?></p>
                        <p><strong>Ciudad de Nacimiento:</strong> <?= $model->ciudad_nacimiento ?></p>
                        <p><strong>Domicilio:</strong> <?= $model->domicilio ?></p>
                        <p><strong>CURP:</strong> <?= $model->curp ?></p>
                        <p><strong>Teléfono de Emergencia:</strong> <?= $model->tel_emerg_principal ?></p>
                        <p><strong>Maya Hablante:</strong> <?= $model->maya_hablante ? 'Sí' : 'No' ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<!-- Añadir los estilos personalizados -->
<style>
    /* Estilo para el botón del acordeón */
    .custom-accordion-button {
        background-color: #f8f9fa !important;
        color: #495057 !important;
        border-radius: 8px;
        padding: 0.75rem 1.25rem;
        font-weight: 500;
        text-align: left;
        border: 1px solid #ced4da;
    }

    .custom-accordion-button:not(.collapsed) {
        background-color: #007bff !important;
        color: #fff !important;
    }

    .custom-accordion-button:focus {
        box-shadow: none !important;
        border-color: #007bff !important;
    }

    /* Reducir el tamaño y mejorar el estilo de la búsqueda */
    .accordion-button.custom-accordion-button {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
    }

    /* Ajustar el tamaño del acordeón para que sea más pequeño */
    .accordion-body {
        padding: 0.75rem;
    }

    /* Limitar el tamaño de la columna de búsqueda */
    .col-md-4 {
        max-width: 350px;
    }

    /* Columna de búsqueda a la izquierda y tabla a la derecha */
    .row {
        display: flex;
        justify-content: space-between;
    }

    .col-md-8 {
        flex: 1;
    }
</style>
