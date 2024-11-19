<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UsoAnteojos $model */

$this->title = $model->id_usoAnteojos;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Anteojos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="uso-anteojos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_usoAnteojos' => $model->id_usoAnteojos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_usoAnteojos' => $model->id_usoAnteojos], [
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
            'id_usoAnteojos',
            'uso',
        ],
    ]) ?>

</div>
