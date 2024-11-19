<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ServicioSalud $model */

$this->title = 'Servicio Salud: ' . $model->id_servicioSalud;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Servicio Salud', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_servicioSalud, 'url' => ['view', 'id_servicioSalud' => $model->id_servicioSalud]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicio-salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
