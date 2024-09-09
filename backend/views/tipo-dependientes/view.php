<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\TipoDependientes $model */

$this->title = $model->idtipo_dependientes;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Dependientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-dependientes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtipo_dependientes' => $model->idtipo_dependientes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtipo_dependientes' => $model->idtipo_dependientes], [
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
            'idtipo_dependientes',
            'tipo',
        ],
    ]) ?>

</div>
