<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\AmbienteSocioeconomico $model */

$this->title = $model->id_ambienteSocioeconomico;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ambiente-socioeconomico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_ambienteSocioeconomico' => $model->id_ambienteSocioeconomico], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de querer eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_ambienteSocioeconomico',
            'vivienda_padres',
            'id_servicios',
            'id_usoPersonal',
            'id_transporte',
            'id_tiempo',
            'id_vivienda',
            'id_bienes',
        ],
    ]) ?>

</div>
