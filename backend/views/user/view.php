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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

    <?php if (!Yii::$app->user->isGuest && $muestra_esta_nav) {
      echo Html::a('Update', ['update', 'id' => $model->id], 
                             ['class' => 'btn btn-primary']);}?>
 
    <?php if (!Yii::$app->user->isGuest && $muestra_esta_nav) {
        echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
            ],
            ]);}?>

    </p>


    <?php
    $columns = [
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
    ];

    
    
    


$dynagrid = DynaGrid::begin([
        'columns' => $columns,
        'theme'=>'panel-info',
        'showPersonalize'=>true,
        'storage' => 'session',
        'gridOptions'=>[
            'dataProvider'=>$dataProvider,
            'filterModel'=>$searchModel,
            'showPageSummary'=>true,
            'responsive' => false,
            'responsiveWrap'=>false,
            'floatHeader'=>true,
            'headerContainer' => ['class' => 'kv-table-header', 'style' => 'top: 50px'],
            'pjax'=>true,
            'panel'=>[
                'heading'=>'<h3 class="panel-title"></i>  USER</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em> Si desea generar un reporte, puede utilizar las opciones siguientes </em></div>',
                'after' => false
            ],
                // set a label for default menu
         
            'toolbar' =>  [ 
                ['content' => '{dynagrid}'],
                
                 ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $columns,
                    'filename'=>'Reporte de carrera',
                     
                    'contentBefore' => [
                        
                        ['value' => 'REPORTE DE USUARIO'],
                        [
                            'value' => '&nbsp;', // Espacio en blanco HTML
                            'format' => 'raw', // Indica que el valor se debe interpretar como HTML
                        ],
                    ],
    
                    'dropdownOptions' => [
                        'label' => 'Exportar',
                        'class' => 'btn btn-default'
                    ]
                    
                ])
                
                
            ]
        ],
        'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
    ]);
    if (substr($dynagrid->theme, 0, 6) == 'simple') {
        $dynagrid->gridOptions['panel'] = false;
    }  
    DynaGrid::end();
    
    ?>



</div>
