<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\TratamientoPsiquiatrico $model */

$this->title = $model->id_tratamientoPsiquiatrico;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tratamiento Psiquiatricos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tratamiento-psiquiatrico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_tratamientoPsiquiatrico' => $model->id_tratamientoPsiquiatrico], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_tratamientoPsiquiatrico',
            'tipo_psiquiatra',
            'tipo_tiempo',
            'tipo_lugar',
        ],
    ]) ?>

</div>
