<?php

namespace app\models;

use Yii;
use yii\base\Model;


class SearchBook extends Model
{
    public $word;

    public function rules()
    {
        return [
            ['word', 'required', 'message' => 'Необходимо заполнить поле'],
        ];
    }
}