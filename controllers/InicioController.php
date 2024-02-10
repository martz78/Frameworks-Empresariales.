<?php

namespace app\controllers;

use app\models\InicioForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\Controller;

class InicioController extends Controller
{
    public function actionIndex()
    {
        $mensaje = 'Yes, it is';
        $h2 = 'UNIVO';
        $dateTime = new \DateTime();

        return $this->render(
            'index',
            [
                'mensaje' => $mensaje,
                'h2' => $h2,
                'dateTime' => $dateTime,
            ]
        );
    }

    public function actionResta()
    {
        $valor_a = 60;
        $valor_b = 8;
        $resultado = $valor_a - $valor_b;

        return $this->render('resta', ['resultado' => $resultado]);
    }

    public function actionSuma()
    {
        $model = new InicioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $operador=$model->operador;
            if($operador=="-"){
                $resultado = $model->valor_a - $model->valor_b;
                $respuesta = ("El resultado de la resta es: " . $resultado);
            }else if($operador=="+"){
                $resultado = $model->valor_a + $model->valor_b;
                $respuesta = ("El resultado de la suma es: " . $resultado);
            }else if($operador=="*"){
                $resultado = $model->valor_a * $model->valor_b;
                $respuesta = ("El resultado de la multiplicacion es: " . $resultado);
            }else if($operador=="/"){
                if($model->valor_b!=0){
                    $resultado = $model->valor_a / $model->valor_b;
                $respuesta = ("El resultado de la division es: " . $resultado);
                }else{
                    $respuesta = ("No se puede dividir entre cero");
                }
            }

            return $this->render('suma', ['model' => $model, 'respuesta' => $respuesta]);
        }

        return $this->render('suma', ['model' => $model]);
    }
}