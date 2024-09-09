<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Momentos $model */

$this->title = 'Update Momento: ' . $model->id_momento;
$this->params['breadcrumbs'][] = ['label' => 'Momentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_momento, 'url' => ['view', 'id_momento' => $model->id_momento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="momentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
