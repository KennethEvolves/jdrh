<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\EstadoCivil $model */

$this->title = 'Estado Civil: ' . $model->nombre_estado_civil;
$this->params['breadcrumbs'][] = ['label' => 'Estado Civil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_estado_civil, 'url' => ['view', 'estado_civil_id' => $model->estado_civil_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="estado-civil-update container mt-5">

    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Estado Civil</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
