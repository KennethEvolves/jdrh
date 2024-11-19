<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RecreacionYTiempoLibre $model */

$this->title = 'Crear Recreacion Y Tiempo Libre';
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recreacion-ytiempo-libre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
