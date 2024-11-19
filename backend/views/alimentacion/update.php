<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */

$this->title = 'Update Alimentacion: ' . $model->id_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alimentacion, 'url' => ['view', 'id_alimentacion' => $model->id_alimentacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
