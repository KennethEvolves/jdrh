<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsosInternet $model */

$this->title = 'Update Usos Internet: ' . $model->idusos_internet;
$this->params['breadcrumbs'][] = ['label' => 'Usos Internets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusos_internet, 'url' => ['view', 'idusos_internet' => $model->idusos_internet]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usos-internet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
