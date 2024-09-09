<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Fases $model */

$this->title = $model->id_fase;
$this->params['breadcrumbs'][] = ['label' => 'Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fases-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_fase' => $model->id_fase], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_fase' => $model->id_fase], [
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
                'attribute' => 'id_fase',
                'label' => 'Fase ' // Cambia el nombre de la columna clave
            ],
            'nombre',
        ],
    ]) ?>

</div>
