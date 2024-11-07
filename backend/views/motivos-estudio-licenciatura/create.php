<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\MotivosEstudioLicenciatura $model */

$this->title = 'Create Motivos Estudio Licenciatura';
$this->params['breadcrumbs'][] = ['label' => 'Motivos Estudio Licenciaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivos-estudio-licenciatura-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
