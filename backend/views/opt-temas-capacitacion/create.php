<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\OptTemasCapacitacion $model */

$this->title = 'Crear Tema de Capacitación';
$this->params['breadcrumbs'][] = ['label' => 'Temas de Capacitación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opt-temas-capacitacion-create container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Crear un nuevo tema de capacitación</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
