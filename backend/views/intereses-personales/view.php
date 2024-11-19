<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\InteresesPersonales $model */

$this->title = $model->id_interesesPersonales;
$this->params['breadcrumbs'][] = ['label' => 'Recreacion Y Tiempo Libre', 'url' => ['recreacion-y-tiempo-libre/index']];
$this->params['breadcrumbs'][] = ['label' => 'Intereses Personales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="intereses-personales-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_interesesPersonales' => $model->id_interesesPersonales], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_interesesPersonales' => $model->id_interesesPersonales], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de querer eliminar este item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_interesesPersonales',
            'tipo_interesesPersonales',
        ],
    ]) ?>

</div>
