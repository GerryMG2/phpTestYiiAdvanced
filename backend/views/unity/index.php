<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'unidad',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
