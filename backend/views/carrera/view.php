<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Carrera $model */

$this->title = $model->id_carrera;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="carrera-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_carrera' => $model->id_carrera], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_carrera' => $model->id_carrera], [
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
            'id_carrera',
            'nombre',
            'clave',
            'creditos',
            'cred_serv_social',
            'descripcion:ntext',
            'carreracol',
        ],
    ]) ?>

</div>
