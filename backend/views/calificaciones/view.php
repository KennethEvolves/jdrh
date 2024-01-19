<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\editable\Editable;
use yii\bootstrap5\BootstrapAsset;



/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */

$this->title = $model->id_calificacion;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="calificaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_calificacion' => $model->id_calificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_calificacion' => $model->id_calificacion], [
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
            'id_calificacion',
            'id_docente',
            'id_unidad_estudio',
            'id_grado',
            'id_grupo',
            'id_alumno',
            'calif_m1',
            'calif_m2',
            'promedio',
            'proyecto_integrador',
            'calif_final',
            'porcentaje_asistencia',
        ],
    ]) ?> 
    
    




</div>
