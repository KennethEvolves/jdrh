<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\TipoSangre $model */

$this->title = 'Tipo Sangre';
$this->params['breadcrumbs'][] = ['label' => 'Salud', 'url' => ['salud/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tipo Sangre', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-sangre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
