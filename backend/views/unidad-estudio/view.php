<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */

$this->title = $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => 'Unidad Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidad-estudio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_unidad' => $model->id_unidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_unidad' => $model->id_unidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_unidad',
            [
                'attribute' => 'id_unidad',
                'label' => 'Unidad ' // Cambia el nombre de la columna clave
            ],

            'clave',
            // 'nombre_asignatura',
            [
                'attribute' => 'nombre_asignatura',
                'label' => 'Nombre De La Asignatura ' // Cambia el nombre de la columna clave
            ],

            // 'creditos_asignatura',
            [
                'attribute' => 'creditos_asignatura',
                'label' => 'Creditos De La Asignatura ' // Cambia el nombre de la columna clave
            ],


            'des_general:ntext',
            'ras_perfil:ntext',
            'sabe_profesionales:ntext',
            'elem_universo:ntext',
            'num_momentos',
            'satca',
            'semestre',
            'plan_estudios_id_plan',
            'fases_id_fase',
        ],
    ]) ?>

</div>
