<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UsosInternet $model */

$this->title = $model->idusos_internet;
$this->params['breadcrumbs'][] = ['label' => 'Usos Internets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usos-internet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idusos_internet' => $model->idusos_internet], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idusos_internet' => $model->idusos_internet], [
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
            'idusos_internet',
            'descripcion',
        ],
    ]) ?>

</div>
