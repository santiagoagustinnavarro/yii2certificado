<?php



use yii\helpers\Html;

$this->title = 'Óptica'
?>
<div class="site-index">

    <div class="jumbotron card image1">
        <h1 class="title">CET N° 15</h1>

        <p class="lead">certificados digitales</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 padding_v">
                <div class="card">
                    <h2 class="title">Certificados</h2>
                    <hr>
                    <p>Creación de certificados de Escolaridad y Regularidad</p>
                    <div class="">
                        <?= Html::a('Ingresar', ['/alumno/'], ['class' => 'btn btn-default width_100']) ?>
                    </div>
                </div>
            </div>

          </div>

    </div>
</div>
