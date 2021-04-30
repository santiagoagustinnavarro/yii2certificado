<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = $model->documento;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alumno-view">

<br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'curso',
            'division',
            'turno',
            'documento',
            'alumno',
        ],
    ]) ?>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->documento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->documento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
