<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaConsumo $model */

$this->title = 'Update Frecuencia Consumo: ' . $model->id_frecuenciaConsumo;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Consumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_frecuenciaConsumo, 'url' => ['view', 'id_frecuenciaConsumo' => $model->id_frecuenciaConsumo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frecuencia-consumo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
