<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OptMotivosEstudio $model */

$this->title = 'Motivo de Estudio: ' . $model->nombre_motivo;
$this->params['breadcrumbs'][] = ['label' => 'Motivos de Estudio', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_motivo, 'url' => ['view', 'motivo_id' => $model->motivo_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="opt-motivos-estudio-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Motivo de Estudio</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
