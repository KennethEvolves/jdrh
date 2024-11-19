<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\LugarAcceso $model */

$this->title = 'Actualizar Lugar Acceso: ' . $model->id_lugarAcceso;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Lugar Accesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_lugarAcceso, 'url' => ['view', 'id_lugarAcceso' => $model->id_lugarAcceso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lugar-acceso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
