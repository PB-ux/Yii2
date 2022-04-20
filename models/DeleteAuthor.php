<?php

namespace app\models;

use Yii;
use yii\base\Model;


class DeleteAuthor extends Model
{
    public $id;

    public function rules()
    {
        return [
            ['id', 'required', 'message' => 'Необходимо заполнить поле'],
        ];
    }
}