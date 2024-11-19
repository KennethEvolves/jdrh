<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alergias $model */

$this->title = 'Alergias';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Alergias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alergias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
