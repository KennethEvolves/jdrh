<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\InformacionPersonal $model */

$this->title = 'Información Personal: ' . $model->inf_personal_id;
\yii\web\YiiAsset::register($this);
?>
<div class="informacion-personal-view" style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <!-- Encabezado con logos -->
    <table width="100%" style="border-bottom: 1px solid #ccc; padding-bottom: 20px;">
        <tr>
            <td align="left"><img src="archivos/sies2.png" width="300" alt="Escuela Normal"></td>
            <td align="right"><img src="archivos/normal.png" width="80" alt="Logo"></td>
        </tr>
    </table>

    <!-- Títulos y subtítulos -->
    <h2 style="text-align: center; font-weight: bold; color: #2c3e50;">Escuela Normal Juan De Dios Rodriguez Heredia</h2>
    <h3 style="text-align: center; font-weight: normal; color: #7f8c8d;">Reporte de Información Personal</h3>
    
    <!-- Título principal -->
    <h1 style="text-align: center; font-size: 24px; margin-top: 30px;"><?= Html::encode($this->title) ?></h1>

    <!-- Detalle de la información personal -->
    <div style="margin-top: 30px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'inf_personal_id',
                    'label' => 'ID de Información Personal',
                ],
                [
                    'attribute' => 'fk_licenciatura',
                    'label' => 'Licenciatura',
                    'value' => $model->fkLicenciatura ? $model->fkLicenciatura->nombre_licenciatura : 'N/A',
                ],
                [
                    'attribute' => 'fk_ciclo_escolar',
                    'label' => 'Ciclo Escolar',
                    'value' => $model->fkCicloEscolar ? $model->fkCicloEscolar->nombre_ciclo_escolar : 'N/A',
                ],
                [
                    'attribute' => 'primera_opcion',
                    'label' => 'Primera Opción',
                    'value' => $model->primera_opcion ? 'Sí' : 'No',
                ],
                [
                    'attribute' => 'eleccion_definitiva',
                    'label' => 'Elección Definitiva',
                    'value' => $model->eleccion_definitiva ? 'Sí' : 'No',
                ],
                [
                    'attribute' => 'otra_licenciatura',
                    'label' => 'Otra Licenciatura',
                ],
                [
                    'attribute' => 'proyecto_5_anios',
                    'label' => 'Proyecto a 5 Años',
                    'format' => 'ntext',
                ],
                [
                    'attribute' => 'proyecto_10_anios',
                    'label' => 'Proyecto a 10 Años',
                    'format' => 'ntext',
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
        <p>&copy; <?= date('Y') ?> Escuela Normal Juan De Dios Rodriguez Heredia. Todos los derechos reservados.</p>
    </div>
</div>
