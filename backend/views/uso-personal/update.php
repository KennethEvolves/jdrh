<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsoPersonal $model */

$this->title = 'Update Uso Personal: ' . $model->id_usoPersonal;
$this->params['breadcrumbs'][] = ['label' => 'Ambiente Socioeconomico', 'url' => ['ambiente-socioeconomico/index']];
$this->params['breadcrumbs'][] = ['label' => 'Uso Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usoPersonal, 'url' => ['view', 'id_usoPersonal' => $model->id_usoPersonal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uso-personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
