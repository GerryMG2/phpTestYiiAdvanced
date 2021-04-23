<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Unity */

$this->title = 'Create Unity';
$this->params['breadcrumbs'][] = ['label' => 'Unities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
