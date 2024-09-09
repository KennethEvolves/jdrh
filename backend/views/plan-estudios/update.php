<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */

$this->title = 'Update Plan De Estudios: ' . $model->id_plan;
$this->params['breadcrumbs'][] = ['label' => 'Plan Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plan, 'url' => ['view', 'id_plan' => $model->id_plan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-estudios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
