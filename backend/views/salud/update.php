<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Salud $model */

$this->title = 'Update Salud: ' . $model->id_salud;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_salud, 'url' => ['view', 'id_salud' => $model->id_salud]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
