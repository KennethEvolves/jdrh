<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use kartik\editable\Editable;

/** @var yii\web\View $this */
/** @var backend\models\Asignaciones $model */

$this->title = $model->grupo_id_grupo;
$this->params['breadcrumbs'][] = ['label' => 'Asignaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asignaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'grupo_id_grupo' => $model->grupo_id_grupo, 'periodo_semestral_id_ciclo' => $model->periodo_semestral_id_ciclo, 'unidad_estudio_id_unidad' => $model->unidad_estudio_id_unidad], [
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
            // 'grupo_id_grupo',
            [
                'attribute' => 'grupo_id_grupo',
                'label' => 'Grupo  ' // Cambia el nombre de la columna clave
            ],

           
            // 'periodo_semestral_id_ciclo',
            [
                'attribute' => 'periodo_semestral_id_ciclo',
                'label' => 'Periodo  ' // Cambia el nombre de la columna clave
            ],

            // 'unidad_estudio_id_unidad',
            [
                'attribute' => 'unidad_estudio_id_unidad',
                'label' => 'Unidad  ' // Cambia el nombre de la columna clave
            ],

            // 'usuario_idusuario',
            [
                'attribute' => 'usuario_idusuario',
                'label' => 'Nombre Del Docente  ' // Cambia el nombre de la columna clave
            ],
        ],

        
    ]) ?>

    
    

</div>
