<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Momentos $model */

$this->title = 'Create Momentos';
$this->params['breadcrumbs'][] = ['label' => 'Momentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="momentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
