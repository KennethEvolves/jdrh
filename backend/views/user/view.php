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
    <?= Html::a('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;GENERAR PDF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;', 
    ['user/viewpdf','id' => $model->id,],
    ['class' => 'btn btn-success', 'target'=>'_blank']) ?>

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
