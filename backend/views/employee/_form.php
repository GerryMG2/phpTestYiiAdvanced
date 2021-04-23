<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Unity;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
    <?php
    echo $form->field($model, 'unidades')->widget(Select2::classname(), [
'data' => ArrayHelper::map(Unity::find()->all(), 'id', 'unidad'),
'language' => 'es',
'options' => ['placeholder' => 'Seleccione una unidad ...'],
'pluginOptions' => [
'allowClear' => true
],
]);
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
