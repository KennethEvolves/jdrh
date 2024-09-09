<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */

$this->title = $model->iddatos_familiares;
$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datos-familiares-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'iddatos_familiares' => $model->iddatos_familiares], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'iddatos_familiares' => $model->iddatos_familiares], [
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
            'iddatos_familiares',
            'estado_civil',
            'numero_hijos',
            'edades_hijos',
            'tipo_beca',
            'dependencia_economica',
            'dependientes_economico',
            'empresa_trabajas',
            'puesto_trabajas',
            'horario_trabajas',
            'id_civill',
            'id_tiposbeca',
            'id_familiares',
            'id_tipo_dependientes',
        ],
    ]) ?>

</div>
