<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Tiposbeca $model */

$this->title = 'Update Tiposbeca: ' . $model->idtipos_beca;
$this->params['breadcrumbs'][] = ['label' => 'Tiposbecas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipos_beca, 'url' => ['view', 'idtipos_beca' => $model->idtipos_beca]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiposbeca-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
