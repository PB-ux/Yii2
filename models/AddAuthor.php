<?php

namespace app\models;

use Yii;
use yii\base\Model;


class AddAuthor extends Model
{
    public $id;
    public $name;
    public $lastname;

    public function rules()
    {
        return [
            [['id', 'name', 'lastname'], 'required', 'message' => 'Необходимо заполнить поле'],
        ];
    }
}