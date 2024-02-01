<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UsosInternet $model */

$this->title = 'Create Usos Internet';
$this->params['breadcrumbs'][] = ['label' => 'Usos Internets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usos-internet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
