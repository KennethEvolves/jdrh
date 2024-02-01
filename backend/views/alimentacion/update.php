<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Alimentacion $model */

$this->title = 'Update Alimentacion: ' . $model->idcomida;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcomida, 'url' => ['view', 'idcomida' => $model->idcomida]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
