<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */

$this->title = 'Create Datos Familiares';
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-familiares-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
