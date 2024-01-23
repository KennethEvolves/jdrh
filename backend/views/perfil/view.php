<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use  common\models\PermisosHelpers;

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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <?php  if  (!Yii::$app->user->isGuest  &&  $mostrar_esta_nav)  {
               echo  Html::a('Update',  ['update',  'id'  =>  $model->id],['class'  =>  'btn  btn-primary']);
     }?>

    <?php  if  (!Yii::$app->user->isGuest  &&  $mostrar_esta_nav)  {
               echo  Html::a('Delete',  ['delete',  'id'  =>  $model->id],  ['class'  =>  'btn  btn-danger',
                'data'  =>  ['confirm'  =>  Yii::t('app',  'Are  you  sure  you  want  to  delete  this  item?'),
                             'method'  =>  'post',
                            ],
    ]);}?>

        <!-- <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->


    </p>

    


<?php
    $columns = [
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
                'heading'=>'<h3 class="panel-title"></i>  PERFIL</h3>',
                'before' =>  '<div style="padding-top: 7px;"><em> Si desea generar un reporte, puede utilizar las opciones siguientes </em></div>',
                'after' => false
            ],
                // set a label for default menu
         
            'toolbar' =>  [ 
                ['content' => '{dynagrid}'],
                
                 ExportMenu::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => $columns,
                    'filename'=>'Reporte de Perfil',
                     
                    'contentBefore' => [
                        
                        ['value' => 'REPORTE DE PERFIL'],
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
