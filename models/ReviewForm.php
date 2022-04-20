<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ReviewForm extends Model
{
  public $name;
  public $email;
  public $dataVisit;
  public $age;
  public $categoryFood;
  public $radioRecomFriend;
  public $review;

  public function rules()
  {
    return [
      [['name', 'email', 'dataVisit', 'age', 'categoryFood', 'radioRecomFriend', 'review'], 'required', 'message' => 'Необходимо заполнить поле'],
      ['email', 'email'], 
      ['age', 'number', 'message' => 'Введите число'],
      ['age', 'compare', 'compareValue' => 18, 'operator' => '>=', 'type' => 'number', 'message' => 'Возраст должен быть от 18 до 100'],
      ['age', 'compare', 'compareValue' => 100, 'operator' => '<=', 'type' => 'number', 'message' => 'Возраст должен быть от 18 до 100'],
      ['review', 'trim'],
    ];
  }
}


?>