<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoSangre $model */

$this->title = 'Update Tipo Sangre: ' . $model->id_tipoSangre;
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tipo Sangre', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipoSangre, 'url' => ['view', 'id_tipoSangre' => $model->id_tipoSangre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-sangre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
