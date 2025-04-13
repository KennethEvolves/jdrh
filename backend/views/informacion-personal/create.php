<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InformacionPersonal $model */
/** @var array $licenciaturas */
/** @var array $ciclosEscolares */

$this->title = 'Crear Información Personal';
$this->params['breadcrumbs'][] = ['label' => 'Información Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="informacion-personal-create container mt-5">

    <!-- Header Section -->
    <div class="header-section text-center mb-8">
        <h1 class="display-4 font-weight-bold text-primary"><?= Html::encode($this->title) ?></h1>
        <h2 class="h3 font-weight-light text-muted">Crear un nuevo registro de información personal</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'licenciaturas' => $licenciaturas,
        'ciclosEscolares' => $ciclosEscolares,
    ]) ?>

</div>
