<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\PermisosHelpers;
use yii\data\ActiveDataProvider;

use common\models\User;


use kartik\dynagrid\DynaGrid;
use kartik\export\ExportMenu;
use kartik\icons\Icon;
Icon::map($this); 
/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->username;
$muestra_esta_nav = PermisosHelpers::requerirMinimoRol('SuperUsuario');

$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    

    <table width="100%">
    
        <tr>
            <td  align="left"><img src="archivos/sies2.png" width="300" ></td>
            <td  align="right"><img src="archivos/normal.png" width="80" ></td>
            
            
        </tr>
</table>
    
     <h4 style="text-align: center; font-weight: bold;">Escuela Normal <br>Juan De Dios Rodriguez Heredia</h4>
        <h4 style="text-align: center;">Reporte de Usuario</h4>

        <h1><?= Html::encode($this->title) ?></h1>
    
    <?=DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute'=>'perfilLink', 'format'=>'raw'],

            'id',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            'rolNombre',
            'estadoNombre',
            'tipoUsuarioNombre',
            'created_at',
            'updated_at',
            //'verification_token',
        // Agrega más columnas según tus necesidades
    
        ],
    ]) 
      
    ?>



</div>
