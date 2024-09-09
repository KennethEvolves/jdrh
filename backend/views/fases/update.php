<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Fases $model */

$this->title = 'Update Fase: ' . $model->id_fase;
$this->params['breadcrumbs'][] = ['label' => 'Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fase, 'url' => ['view', 'id_fase' => $model->id_fase]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fases-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
