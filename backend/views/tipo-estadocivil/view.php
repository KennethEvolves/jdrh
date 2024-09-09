<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\TipoEstadocivil $model */

$this->title = $model->idtipo_estadocivil;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Estadocivils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tipo-estadocivil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idtipo_estadocivil' => $model->idtipo_estadocivil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idtipo_estadocivil' => $model->idtipo_estadocivil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtipo_estadocivil',
            'descripcion',
        ],
    ]) ?>

</div>
