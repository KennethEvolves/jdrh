<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\EjercicioYDeporte $model */

$this->title = $model->id_ejercicioDeporte;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ejercicio-ydeporte-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_ejercicioDeporte' => $model->id_ejercicioDeporte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_ejercicioDeporte' => $model->id_ejercicioDeporte], [
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
            'id_ejercicioDeporte',
            'veces_ejercicio',
            'id_actividad',
            'id_deporte',
        ],
    ]) ?>

</div>
