<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\ProblemasUltimoSemestre $model */

$this->title = $model->id_problemasUltimoSemestre;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Problemas Ultimo Semestre', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="problemas-ultimo-semestre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actuaizar', ['update', 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_problemasUltimoSemestre' => $model->id_problemasUltimoSemestre], [
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
            'id_problemasUltimoSemestre',
            'tiene_problema',
            'tipo_problema',
        ],
    ]) ?>

</div>
