<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\EscalaConsumo $model */

$this->title = 'Update Escala Consumo: ' . $model->id_escala;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['alimentacion/index']];
$this->params['breadcrumbs'][] = ['label' => 'Escala Consumos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_escala, 'url' => ['view', 'id_escala' => $model->id_escala]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escala-consumo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
