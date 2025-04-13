<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Licenciaturas $model */

$this->title = 'Licenciatura: ' . $model->nombre_licenciatura;
$this->params['breadcrumbs'][] = ['label' => 'Licenciaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_licenciatura, 'url' => ['view', 'licenciatura_id' => $model->licenciatura_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="licenciaturas-update container mt-5">

    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Licenciatura</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
