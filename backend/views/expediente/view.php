<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Expediente $model */

$this->title = $model->idexpediente;
$this->params['breadcrumbs'][] = ['label' => 'Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idexpediente' => $model->idexpediente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idexpediente' => $model->idexpediente], [
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
            'idexpediente',
            'id_tutor',
            'id_generacion',
            'id_grupocreado',
            'fecha_elaboracion',
            'fecha_actualizacion',
        ],
    ]) ?>

</div>
