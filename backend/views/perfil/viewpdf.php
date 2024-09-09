<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use  common\models\PermisosHelpers;
use yii\helpers\Url;
use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\icons\Icon;
Icon::map($this); 

/** @var yii\web\View $this */
/** @var frontend\models\Perfil $model */

$this->title =  $model->user->username;

$mostrar_esta_nav  =  PermisosHelpers::requerirMinimoRol('SuperUsuario');

$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view">

    

    
<table width="100%">
    
        <tr>
            <td  align="left"><img src="archivos/sies2.png" width="300" ></td>
            <td  align="right"><img src="archivos/normal.png" width="80" ></td>
            
            
        </tr>
</table>
    
     <h4 style="text-align: center; font-weight: bold;">Escuela Normal <br>Juan De Dios Rodriguez Heredia</h4>
        <h4 style="text-align: center;">Reporte de Perfil</h4>


        <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'userLink',  'format'=>'raw'],
            'id',
            //'user_id',
            'nombre:ntext',
            'apellido:ntext',
            'fecha_nacimiento',
            'telefono',
            'pagina_web',
            'genero.genero_nombre',
            'created_at',
            'updated_at',
        ],
    ]) ?>


</div>
