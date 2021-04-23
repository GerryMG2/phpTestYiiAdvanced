<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Unity */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
    $url = 'unity/validation';
}else{
    $url = 'unity/validation';
}
?>

<div class="unity-form">

    <?php $form = ActiveForm::begin(['id' => $model->formName(),
                                    'enableAjaxValidation' => true,
                                    'validationUrl' => Url::toRoute($url)]); ?>
    <div class="model-body">
        <div class="form-group">
        <?= $form->field($model, 'unidad')->textInput(['maxlength' => true]) ?>

        </div>
    </div>
    <div class="modal-footer">
        <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 
        'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success btn-block' : 
        'btn btn-primary btn-block']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
