<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Actividad $model */

$this->title = $model->id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Ejercicio Y Deporte', 'url' => ['ejercicio-y-deporte/index']];
$this->params['breadcrumbs'][] = ['label' => 'Actividad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="actividad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_actividad' => $model->id_actividad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_actividad' => $model->id_actividad], [
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
            'id_actividad',
            'tipo_actividad',
        ],
    ]) ?>

</div>
