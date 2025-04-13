<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\CicloEscolar $model */

$this->title = 'Ciclo Escolar: ' . $model->nombre_ciclo_escolar;
$this->params['breadcrumbs'][] = ['label' => 'Ciclo Escolar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_ciclo_escolar, 'url' => ['view', 'ciclo_escolar_id' => $model->ciclo_escolar_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ciclo-escolar-update container mt-5">

    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Ciclo Escolar</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
