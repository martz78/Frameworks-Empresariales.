<?php

namespace app\models;

use Yii;
use yii\base\Model;

class InicioForm extends Model
{
    public $valor_a;
    public $valor_b;
    public $operador;

    public function rules(
)
    {
        return [
            [['valor_a', 'valor_b','operador'], 'required'],
            [['valor_a', 'valor_b'], 'number'],
        ];
    }
}