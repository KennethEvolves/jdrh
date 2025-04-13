<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\icons\Icon;

Icon::map($this);

/** @var yii\web\View $this */
/** @var backend\models\Licenciaturas $model */

$this->title = $model->nombre_licenciatura;

\yii\web\YiiAsset::register($this);
?>
<div class="licenciaturas-view-pdf" style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <!-- Encabezado con logos -->
    <table width="100%" style="border-bottom: 1px solid #ccc; padding-bottom: 20px;">
        <tr>
            <td align="left"><img src="archivos/sies2.png" width="300" alt="Escuela Normal"></td>
            <td align="right"><img src="archivos/normal.png" width="80" alt="Logo"></td>
        </tr>
    </table>

    <!-- Títulos principales -->
    <h2 style="text-align: center; font-weight: bold; color: #2c3e50;">Escuela Normal Juan De Dios Rodríguez Heredia</h2>
    <h3 style="text-align: center; font-weight: normal; color: #7f8c8d;">Reporte de Licenciatura</h3>

    <!-- Título de la licenciatura -->
    <h1 style="text-align: center; font-size: 24px; margin-top: 30px;"><?= Html::encode($model->nombre_licenciatura) ?></h1>

    <!-- Detalles de la licenciatura -->
    <div style="margin-top: 30px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'licenciatura_id',
                    'label' => 'ID de Licenciatura',
                ],
                [
                    'attribute' => 'nombre_licenciatura',
                    'label' => 'Nombre de la Licenciatura',
                ],
                [
                    'attribute' => 'desc_licenciatura',
                    'label' => 'Descripción',
                ],
            ],
            'options' => [
                'class' => 'table table-bordered table-striped',
                'style' => 'width: 100%; margin-top: 20px; border: 1px solid #ddd;',
            ],
        ]) ?>
    </div>

    <!-- Pie de página -->
    <div style="position: fixed; bottom: 20px; left: 0; width: 100%; text-align: center; font-size: 12px; color: #7f8c8d;">
        <p>&copy; <?= date('Y') ?> Escuela Normal Juan De Dios Rodríguez Heredia. Todos los derechos reservados.</p>
    </div>
</div>
