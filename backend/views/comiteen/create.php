<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Comiteen $model */

$this->title = 'Comiteen';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Comiteen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comiteen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
