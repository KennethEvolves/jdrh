<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Perfil $model */

$this->title = 'Perfil de: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="perfil-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Perfil</h2>
    </div>

    <!-- Formulario de actualización -->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
