<?php

namespace app\models;

use Yii;
use yii\base\Model;

class InicioForm extends Model
{
    public $numero_a;
    public $numero_b;
    public $operador;

    public function rules(
)
    {
        return [
            [['numero_a', 'numero_b','operador'], 'required'],
            [['numero_a', 'numero_b'], 'number'],
        ];
    }
}