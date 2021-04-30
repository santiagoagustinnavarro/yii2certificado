<?php

use yii\helpers\Html;
use yii\grid\GridView;

//agregada //
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $searchModel app\models\AlumnoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alumno-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
      <div class="col-md-3" >
        <p>
            <?= Html::a('Carga un alumno', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
       </div>
      <div class="col-md-3 glyphicon glyphicon-print" style="font-size:19px; color:#CB4335">
        Escolaridad
       </div>

      <div class="col-md-3 glyphicon glyphicon-print" style="font-size:19px;color:#F39C12">
        Regularidad
      </div>


    </div>

    <br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [ //' Numeración de fila
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['style' => 'width: 50px;', 'class' => 'text-center'],
            ],


            [/// imprimir word
             'class' => 'yii\grid\DataColumn',
             'visible' => '1', // oculta esta columna
             'label' => '',
             'format' => 'raw',
             'value' => function ($searchModel) {
               $url = Url::to(['imprimir-regular','documento'=>$searchModel->documento]);
               $atributos = ['class' => 'glyphicon glyphicon-print','style'=>'font-size:19px;color:#F39C12 '];
               return Html::a('',  $url, $atributos);
             },
             'headerOptions' => ['class' => 'text-left'],
             'contentOptions' => ['style' => 'width: 50px;', 'class' => 'text-center'],
            ],

            [/// imprimir word
                 'class' => 'yii\grid\DataColumn',
                 'visible' => '1', // oculta esta columna
                 'label' => '',
                 'format' => 'raw',
                 'value' => function ($searchModel) {
                   $url = Url::to(['imprimir-escolaridad','documento'=>$searchModel->documento]);
                   $atributos = ['class' => 'glyphicon glyphicon-print','style'=>'font-size:19px; color:#CB4335'];
                   return Html::a('',  $url, $atributos);
                 },
                 'headerOptions' => ['class' => 'text-left'],
                 'contentOptions' => ['style' => 'width: 50px;', 'class' => 'text-center'],
            ],


            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '0', // 0 oculta esta columna
              'attribute' => 'curso',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:80px;', 'class' => 'text-left'], // ancho de la columna aliniación del texto
            ],

            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '0', // 0 oculta esta columna
              'attribute' => 'division',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:80px;', 'class' => 'text-left'], // ancho de la columna aliniación del texto
            ],

            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '0', // 0 oculta esta columna
              'attribute' => 'turno',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:90px;', 'class' => 'text-left'], // ancho de la columna aliniación del texto
            ],

            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '1', // 0 oculta esta columna
              'attribute' => 'documento',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:140px;', 'class' => 'text-left'], // ancho de la columna aliniación del texto
            ],
            'alumno',


            ['class' => 'yii\grid\ActionColumn',
             'headerOptions' => ['class' => 'text-center'],
             'contentOptions' => ['style' => 'width: 80px;', 'class' => 'text-center'],
            ],
        ],
    ]); ?>


</div>
