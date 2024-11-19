<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ProblemasUltimoSemestre $model */

$this->title = 'Problemas Ultimo Semestre';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Problemas Ultimo Semestre', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="problemas-ultimo-semestre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
