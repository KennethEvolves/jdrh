<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Tiposbeca $model */

$this->title = $model->idtipos_beca;
$this->params['breadcrumbs'][] = ['label' => 'Tiposbecas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tiposbeca-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtipos_beca' => $model->idtipos_beca], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtipos_beca' => $model->idtipos_beca], [
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
            'idtipos_beca',
            'nombre',
        ],
    ]) ?>

</div>
