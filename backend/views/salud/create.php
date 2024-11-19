<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Salud $model */

$this->title = 'Fomulario de Salud';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
