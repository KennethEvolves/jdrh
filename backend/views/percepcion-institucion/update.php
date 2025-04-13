<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PercepcionInstitucion $model */

$this->title = 'Percepcion Institucion: ' . $model->per_inst_id;
$this->params['breadcrumbs'][] = ['label' => 'Percepción Institucional', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->per_inst_id, 'url' => ['view', 'per_inst_id' => $model->per_inst_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="percepcion-institucion-update container mt-5">

    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Percepción Institución</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
