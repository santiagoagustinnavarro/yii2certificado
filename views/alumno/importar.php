<?php

  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use yii\bootstrap\Modal;
  use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model,'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Importar a la base de datos',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
