<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Genero $model */

$this->title = 'Género: ' . $model->genero_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Géneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->genero_nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="genero-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Género</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
