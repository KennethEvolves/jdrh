<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Vacunas $model */

$this->title = 'Vacunas: ' . $model->id_vacunas;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Vacunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vacunas, 'url' => ['view', 'id_vacunas' => $model->id_vacunas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacunas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
