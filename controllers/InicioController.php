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
        $numero_a = 60;
        $numero_b = 8;
        $resultado = $numero_a - $numero_b;

        return $this->render('resta', ['resultado' => $resultado]);
    }

    public function actionSuma()
    {
        $model = new InicioForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $operador=$model->operador;
            if($operador=="-"){
                $resultado = $model->numero_a - $model->numero_b;
                $respuesta = ("El resultado de la resta es: " . $resultado);
            }else if($operador=="+"){
                $resultado = $model->numero_a + $model->numero_b;
                $respuesta = ("El resultado de la suma es: " . $resultado);
            }else if($operador=="*"){
                $resultado = $model->numero_a * $model->numero_b;
                $respuesta = ("El resultado de la multiplicacion es: " . $resultado);
            }else if($operador=="/"){
                if($model->numero_b!=0){
                    $resultado = $model->numero_a / $model->numero_b;
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