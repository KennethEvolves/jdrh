<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaConsumo $model */

$this->title = 'Formulario frecuencia de consumo';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Consumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frecuencia-consumo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
