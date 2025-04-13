<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InformacionPersonal $model */
/** @var array $licenciaturas */
/** @var array $ciclosEscolares */

$this->title = 'Información Personal: ' . $model->inf_personal_id;
$this->params['breadcrumbs'][] = ['label' => 'Informacion Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inf_personal_id, 'url' => ['view', 'inf_personal_id' => $model->inf_personal_id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="informacion-personal-update container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Actualizar Información Personal</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'licenciaturas' => $licenciaturas,
        'ciclosEscolares' => $ciclosEscolares,
    ]) ?>

</div>
