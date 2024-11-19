<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MotivosEstudioLicenciatura $model */

$this->title = 'Update Motivos Estudio Licenciatura: ' . $model->id_motivosEstudioLicenciatura;
$this->params['breadcrumbs'][] = ['label' => 'Motivos Estudio Licenciaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_motivosEstudioLicenciatura, 'url' => ['view', 'id_motivosEstudioLicenciatura' => $model->id_motivosEstudioLicenciatura]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="motivos-estudio-licenciatura-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
