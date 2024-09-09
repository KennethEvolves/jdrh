<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */

$this->title = $model->idcomida;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idcomida' => $model->idcomida], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idcomida' => $model->idcomida], [
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
            'idcomida',
        ],
    ]) ?>

</div>
