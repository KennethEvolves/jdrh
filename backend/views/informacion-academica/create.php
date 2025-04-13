<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InformacionAcademica $model */

$this->title = 'Crear Información Académica';
$this->params['breadcrumbs'][] = ['label' => 'Información Académica', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-academica-create container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Crear un nuevo registro de información académica</h2>
    </div>

    <!-- Form Section -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
