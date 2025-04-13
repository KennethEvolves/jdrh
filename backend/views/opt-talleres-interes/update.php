<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OptTalleresInteres $model */

$this->title = 'Taller de Interés: ' . $model->nombre_taller;
$this->params['breadcrumbs'][] = ['label' => 'Talleres de Interés', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_taller, 'url' => ['view', 'taller_id' => $model->taller_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="opt-talleres-interes-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Taller de Interés</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
