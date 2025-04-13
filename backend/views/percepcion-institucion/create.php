<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PercepcionInstitucion $model */

$this->title = 'Crear Percepción Institución';
$this->params['breadcrumbs'][] = ['label' => 'Percepción Institucional', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="percepcion-institucion-create container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Crear una nueva percepción institucional</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
