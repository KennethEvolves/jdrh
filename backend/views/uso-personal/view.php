<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\UsoPersonal $model */

$this->title = $model->id_usoPersonal;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="uso-personal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Guardar', ['update', 'id_usoPersonal' => $model->id_usoPersonal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_usoPersonal' => $model->id_usoPersonal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?   ',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_usoPersonal',
            'tipo_usoPersonal',
        ],
    ]) ?>

</div>
