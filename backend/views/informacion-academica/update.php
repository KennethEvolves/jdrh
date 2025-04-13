<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InformacionAcademica $model */

$this->title = 'Actualizar Información Académica: ' . $model->inf_academica_id;
$this->params['breadcrumbs'][] = ['label' => 'Información Académica', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inf_academica_id, 'url' => ['view', 'inf_academica_id' => $model->inf_academica_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="informacion-academica-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Información Académica</h2>
    </div>

    <!-- Form Section -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
