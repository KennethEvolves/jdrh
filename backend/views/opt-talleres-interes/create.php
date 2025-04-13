<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OptTalleresInteres $model */

$this->title = 'Crear Taller de Interés';
$this->params['breadcrumbs'][] = ['label' => 'Talleres de Interés', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opt-talleres-interes-create container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Crear un nuevo taller de interés</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
