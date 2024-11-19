<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Deporte $model */

$this->title = $model->id_deporte;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Deporte', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="deporte-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_deporte' => $model->id_deporte], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_deporte' => $model->id_deporte], [
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
            'id_deporte',
            'tipo_deporte',
        ],
    ]) ?>

</div>
