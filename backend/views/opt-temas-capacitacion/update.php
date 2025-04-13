<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OptTemasCapacitacion $model */

$this->title = 'Tema de Capacitación: ' . $model->tema_id;
$this->params['breadcrumbs'][] = ['label' => 'Temas de Capacitación', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tema_id, 'url' => ['view', 'tema_id' => $model->tema_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="opt-temas-capacitacion-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Tema de Capacitación</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
