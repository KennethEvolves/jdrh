<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InteresesPersonales $model */

$this->title = 'Actualizar Intereses Personales: ' . $model->id_interesesPersonales;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Intereses Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_interesesPersonales, 'url' => ['view', 'id_interesesPersonales' => $model->id_interesesPersonales]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="intereses-personales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
