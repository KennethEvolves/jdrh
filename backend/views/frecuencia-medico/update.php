<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\FrecuenciaMedico $model */

$this->title = 'Frecuencia Medico: ' . $model->id_frecuenciaMedico;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Frecuencia Medico', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_frecuenciaMedico, 'url' => ['view', 'id_frecuenciaMedico' => $model->id_frecuenciaMedico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="frecuencia-medico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
