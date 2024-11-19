<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RecreacionYTiempoLibre $model */

$this->title = 'Actualizar Recreacion Y Tiempo Libre: ' . $model->id_recreacionTiempoLibre;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_recreacionTiempoLibre, 'url' => ['view', 'id_recreacionTiempoLibre' => $model->id_recreacionTiempoLibre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recreacion-ytiempo-libre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
