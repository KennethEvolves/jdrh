<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Comiteen $model */

$this->title = 'Comiteen: ' . $model->id_comiteEN;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Comiteen', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comiteEN, 'url' => ['view', 'id_comiteEN' => $model->id_comiteEN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comiteen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
