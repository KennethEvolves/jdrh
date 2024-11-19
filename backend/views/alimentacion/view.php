<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */

$this->title = $model->id_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_alimentacion' => $model->id_alimentacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_alimentacion' => $model->id_alimentacion], [
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
            'id_alimentacion',
            'id_lugarAlimentacion',
            'id_frecuenciaConsumo',
        ],
    ]) ?>

</div>
