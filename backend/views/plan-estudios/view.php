<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */

$this->title = $model->id_plan;
$this->params['breadcrumbs'][] = ['label' => 'Plan Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="plan-estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_plan' => $model->id_plan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_plan' => $model->id_plan], [
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
            'id_plan',
            'nombre',
            'fecha_autorizacion',
            'vigencia',
            'estado',
            'observaciones:ntext',
            'carrera_id_carrera',
        ],
    ]) ?>

</div>
