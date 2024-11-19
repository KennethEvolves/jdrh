<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\InteresesPersonales $model */

$this->title = 'Crear Intereses Personales';
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Intereses Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intereses-personales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
