<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Adicciones $model */

$this->title = 'Crear Adicciones';
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['habitos/index']];
$this->params['breadcrumbs'][] = ['label' => 'Adicciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adicciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
