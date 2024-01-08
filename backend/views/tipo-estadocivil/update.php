<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoEstadocivil $model */

$this->title = 'Update Tipo Estadocivil: ' . $model->idtipo_estadocivil;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Estadocivils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtipo_estadocivil, 'url' => ['view', 'idtipo_estadocivil' => $model->idtipo_estadocivil]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-estadocivil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
