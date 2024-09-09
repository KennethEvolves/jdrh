<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Fases $model */

$this->title = 'Create Fases';
$this->params['breadcrumbs'][] = ['label' => 'Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fases-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
