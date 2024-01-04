<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Momentos $model */

$this->title = $model->id_momento;
$this->params['breadcrumbs'][] = ['label' => 'Momentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="momentos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_momento' => $model->id_momento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_momento' => $model->id_momento], [
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
            'id_momento',
            'nombre',
            'subtemas:ntext',
            'act_aprendizaje:ntext',
            'act_ensenanza:ntext',
            'sugerencia_evaluacion:ntext',
            'fuentes_aprendizaje:ntext',
            'unidad_estudio_id_unidad',
        ],
    ]) ?>

</div>
