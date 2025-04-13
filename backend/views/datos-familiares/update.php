<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */
/** @var array $estadoCivilOptions */

$this->title = 'Actualizar Datos Familiares: ' . $model->id_datosFamiliares;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_datosFamiliares, 'url' => ['view', 'id_datosFamiliares' => $model->id_datosFamiliares]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="datos-familiares-update container mt-5">

    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Datos Familiares</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'estadoCivilOptions' => $estadoCivilOptions,
    ]) ?>
</div>
