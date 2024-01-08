<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Tiposbeca $model */

$this->title = 'Create Tiposbeca';
$this->params['breadcrumbs'][] = ['label' => 'Tiposbecas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposbeca-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
