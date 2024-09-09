<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\PeriodoSemestral $model */

$this->title = $model->id_ciclo;
$this->params['breadcrumbs'][] = ['label' => 'Periodo Semestrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="periodo-semestral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_ciclo' => $model->id_ciclo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_ciclo' => $model->id_ciclo], [
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
            
            [
                'attribute' => 'id_ciclo',
                'label' => 'Ciclo ' // Cambia el nombre de la columna clave
            ],
            'fecha_inicio',
            'fecha_fin',
            'periodo',
            'semanas',
            'estado',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
