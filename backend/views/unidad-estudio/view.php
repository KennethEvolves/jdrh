<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/** @var yii\web\View $this */
/** @var backend\models\UnidadEstudio $model */

$this->title = $model->nombre_asignatura;
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

<!-- boton para generar la exportacion en pdf -->
</p>
    <?= Html::a('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;GENERAR PDF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;', 
    ['unidad-estudio/viewpdf','id' => $model->id_unidad,],
    ['class' => 'btn btn-success', 'target'=>'_blank']) ?>




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
                'label' => 'Nombre De La Asignatura ' 
            ],

            // 'creditos_asignatura',
            [
                'attribute' => 'creditos_asignatura',
                'label' => 'Creditos De La Asignatura ' 
            ],


            // 'des_general:ntext',
            [
                'attribute' => 'des_general',
                'label' => 'Descripción General',
                'format' => 'raw',  // Utiliza 'raw' para permitir HTML
            ],
            // 'ras_perfil:ntext',
            [
                'attribute' => 'ras_perfil',
                'label' => 'Rasgos del perfil ',
                'format' => 'raw',  // Utiliza 'raw' para permitir HTML 
            ],
            // 'sabe_profesionales:ntext',
            [
                'attribute' => 'sabe_profesionales',
                'label' => 'Saberes Profesionales ',
                'format' => 'raw',  // Utiliza 'raw' para permitir HTML 
            ],



            // 'elem_universo:ntext',
            [
                'attribute' => 'elem_universo',
                'label' => 'Elementos del universo ' 
            ],
            // 'num_momentos',
            [
                'attribute' => 'num_momentos',
                'label' => 'Numero de momentos' 
            ],
            'satca',
            'semestre',
            // 'plan_estudios_id_plan',
            [
                'attribute' => 'plan_estudios_id_plan',
                'label' => 'Numero de momentos' 
            ],
            // 'fases_id_fase',
            [
                'attribute' => 'fases_id_fase',
                'label' => 'Fases' 
            ],
        ],
    ]) ?>

</div>
