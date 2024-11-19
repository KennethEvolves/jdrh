<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\LugarAlimentacion $model */

$this->title = $model->id_lugarAlimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];                         
$this->params['breadcrumbs'][] = ['label' => 'Lugar Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lugar-alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_lugarAlimentacion' => $model->id_lugarAlimentacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_lugarAlimentacion' => $model->id_lugarAlimentacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_lugarAlimentacion',
            'tipo_lugar',
            'id_escala',
        ],
    ]) ?>

</div>
