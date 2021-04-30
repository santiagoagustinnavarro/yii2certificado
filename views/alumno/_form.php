<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alumno */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alumno-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'curso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'division')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'turno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'documento')->textInput() ?>

    <?= $form->field($model, 'alumno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
