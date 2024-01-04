<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\PeriodoSemestral $model */

$this->title = 'Create Periodo Semestral';
$this->params['breadcrumbs'][] = ['label' => 'Periodo Semestrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodo-semestral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
