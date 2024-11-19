<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alergias $model */

$this->title = 'Update Alergias: ' . $model->id_alergias;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Alergias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alergias, 'url' => ['view', 'id_alergias' => $model->id_alergias]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alergias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
