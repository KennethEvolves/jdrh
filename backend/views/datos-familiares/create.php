<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */
/** @var array $estadoCivilOptions */

$this->title = 'Crear Datos Familiares';
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-familiares-create container mt-5">

    <div class="header-section text-center mb-4">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h5 font-weight-light text-muted">Crear un nuevo registro de datos familiares</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'estadoCivilOptions' => $estadoCivilOptions,
    ]) ?>
</div>
