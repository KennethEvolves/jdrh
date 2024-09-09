<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PlanEstudios $model */

$this->title = 'Create Plan Estudios';
$this->params['breadcrumbs'][] = ['label' => 'Plan Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-estudios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
