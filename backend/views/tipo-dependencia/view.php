<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependencia $model */

$this->title = $model->idtipo_dependencia;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-dependencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtipo_dependencia' => $model->idtipo_dependencia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtipo_dependencia' => $model->idtipo_dependencia], [
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
            'idtipo_dependencia',
            'tipo',
        ],
    ]) ?>

</div>
