<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Habitos $model */

$this->title = $model->id_habitos;
$this->params['breadcrumbs'][] = ['label' => 'Habitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="habitos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_habitos' => $model->id_habitos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_habitos' => $model->id_habitos], [
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
            'id_habitos',
            'habito_fumar',
            'num_cigarros',
            'habito_alcohol',
            'veces_semana',
            'id_adicciones',
        ],
    ]) ?>

</div>
