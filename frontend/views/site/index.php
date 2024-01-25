<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'SISTEMA JDRH';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Bienvenido al Sistema!</h1>
            <p class="fs-5 fw-light">Aplicación creada para el control escolar JDRH</p>
            <p><a class="btn btn-lg btn-success" href="http://localhost/JDRH/backend/web/index.php?r=site%2Flogin">CONTROL ESCOLAR JDRH</a></p>
        </div>
    </div>

    <div class="body-content">  

        <div class="row">
            <div class="col-lg-4">
                <h2>Moodle</h2>
                <p>Para dirigirse a moodle puede dar click en el siguiente boton.</p>

                <p><a class="btn btn-outline-secondary" href="http://normaljuandediosrh.com/moodle/">Moodle JDRH &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Evaluación Docente</h2>

                <p>Para dirigirse a la evaluación docente puede dar clic en el siguiente boton.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.normaljuandediosrh.com/evadoc/">Evaluación Docente &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Página Ofical </h2>

                <p>Para dirigirse a la página Oficiall.</p>

                <p><a class="btn btn-outline-secondary" href="http://www.normaljuandediosrh.com/">normaljuandediosrh &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
