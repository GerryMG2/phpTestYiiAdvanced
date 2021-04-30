<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unity-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Html::button('+ Nueva unidad', 
    ['value' => Url::to(Yii::$app->getUrlManager()->getBaseUrl()."/unity/create"),'class' => 'btn btn-info showModalButton', 'title' => "Nueva unidad"]
    ) 
    ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php Pjax::begin(["id" => "unidades-grid"]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions'=>['class'=>'kartik-sheet-style'],
'filterRowOptions'=>['class'=>'kartik-sheet-style'],
'pjax'=>true,
'toolbar'=> [
     ['content'=>
      Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'Nuevo', 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation
      form.\n\nDisabled for this demo!");']) . ' '.Html::a('<i class="glyphicon
      glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0,
      'class'=>'btn btn-default', 'title'=>'Reset Grid'])
],
'{export}',
'{toggleData}',
],
'columns' => [
['class' => 'yii\grid\SerialColumn'],
'unidad',
'created_at',
'updated_at',
['class' => 'yii\grid\ActionColumn'],
['class' => 'yii\grid\ActionColumn',
'buttons'=>[
'view'=>function ($url, $model) 
{ 
    $t = 'unidades/view/'.$model->id;
$t = Yii::$app->getUrlManager()->getBaseUrl()."/unity/view/".$model->id;
return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value' => Url::to($t),'class' => 'btn btn-info showModalButton', 'title' => "Ver empleado"]);
},'update'=>function ($url, $model) {
$t = 'unidades/update/'.$model->id;
$t = Yii::$app->getUrlManager()->getBaseUrl()."/unity/update/".$model->id;
return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>Url::to($t), 'class' => 'btn btn-info showModalButton', 'title' => "Editar empleado"]);
},'delete' => function($url, $model){
$t = 'unity/delete/'.$model->id;
$t = Yii::$app->getUrlManager()->getBaseUrl()."/unity/delete/".$model->id;
return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, ['class' => 'btn btn-danger','title' => 'Eliminar',
'data-confirm' => '¿Desea realmente eliminar la unidad: '.$model->unidad. '?', 'data-method' => 'post',
]);
}
],
],
],
'panel'=>[
'type'=>GridView::TYPE_PRIMARY,
//'heading'=>$heading,
],
'responsive'=>true,
'hover'=>true
]); ?>
<?php Pjax::end() ?>