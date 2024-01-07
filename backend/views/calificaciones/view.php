<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Calificaciones $model */

$this->title = $model->id_calificaciones;
$this->params['breadcrumbs'][] = ['label' => 'Calificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="calificaciones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_calificaciones' => $model->id_calificaciones], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_calificaciones' => $model->id_calificaciones], [
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
            'id_calificaciones',
            'nombre:ntext',
            'asistencia',
            'total',
            'rasgos_evaluar',
            'usuario_alumno',
            'usuario_docente',
        ],
    ]) ?>

</div>
