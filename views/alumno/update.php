<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */

$this->title = 'Update Alumno: ' . $model->documento;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->documento, 'url' => ['view', 'id' => $model->documento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alumno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
