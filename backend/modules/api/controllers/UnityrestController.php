<?php

namespace backend\modules\api\controllers;
use backend\modules\api\models\Unity;
use PDO;

class UnityrestController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex(){
        
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $unidades = Unity::find()->all();
        return array("unidades" => $unidades);
    }

    public function actionCreate(){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $unidades = new Unity();
        $unidades->scenario = Unity::SCRENARIO_CREATE;
        $unidades->attributes = \Yii::$app->request->post();
        if($unidades->validate()){
            $unidades->save();
            return array("estado" => true, 'data' => 'La unidad ha sido creada');

        }else{
            return array("estado" => false,"msg" => $unidades->getErrors());
        }
        
    }
}
