<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var backend\models\DatosFamiliares $model */

$this->title = 'Datos Familiares: ' . $model->id_datosFamiliares;

$this->params['breadcrumbs'][] = ['label' => 'Datos Familiares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="datos-familiares-view" style="font-family: Arial, sans-serif; line-height: 1.6; padding: 20px;">

    <!-- Encabezado con logo -->
    <table width="100%" style="border-bottom: 1px solid #ccc; padding-bottom: 20px;">
        <tr>
            <td align="left"><img src="archivos/sies2.png" width="300" alt="Escuela Normal" ></td>
            <td align="right"><img src="archivos/normal.png" width="80" alt="Logo" ></td>
        </tr>
    </table>

    <!-- Títulos y subtítulos -->
    <h2 style="text-align: center; font-weight: bold; color: #2c3e50;">Escuela Normal Juan De Dios Rodriguez Heredia</h2>
    <h3 style="text-align: center; font-weight: normal; color: #7f8c8d;">Reporte de Datos Familiares</h3>

    <!-- Título de los Datos Familiares -->
    <h1 style="text-align: center; font-size: 24px; margin-top: 30px;"><?= 'Dato Familiar: ' . $model->id_datosFamiliares ?></h1>

    <!-- Detalle de los Datos Familiares con formato -->
    <div style="margin-top: 30px;">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                ['attribute' => 'id_datosFamiliares', 'label' => 'ID de Datos Familiares'],
                [
                    'attribute' => 'fk_estado_civil',
                    'label' => 'Estado Civil',
                    'value' => function ($model) {
                        return $model->fkEstadoCivil ? $model->fkEstadoCivil->nombre_estado_civil : 'No definido';
                    },
                ],
                'padre_nombre',
                'padre_apellido',
                'padre_ocupacion',
                'padre_fecha_nacimiento',
                'madre_nombre',
                'madre_apellido',
                'madre_ocupacion',
                'madre_fecha_nacimiento',
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
