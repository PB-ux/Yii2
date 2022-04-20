<?php

namespace app\models;

use Yii;
use yii\base\Model;


// Signup form

class SignupForm extends Model 
{
  public $username;
  public $email;
  public $password;
  public $verifyCode;

  public function rules()
  {
    return [
      ['username', 'trim'],
      ['username', 'required'],
      ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Это имя уже существует'],
      ['username', 'string', 'min' => 2, 'max' => 255],
      ['email', 'trim'],
      ['email', 'required'],
      ['email', 'email'],
      ['email', 'string', 'max' => 255],
      ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'Этот email уже существует'],
      ['password', 'required'],
      ['password', 'string', 'min' => 6],
    ];
  }

  public function signup()
  {
    if (!$this->validate()) {
      return null;
    }

    $user = new User();
    $user->username = $this->username;
    $user->email = $this->email;
    $user->setPassword($this->password);
    $user->generateAuthKey();
    return $user->save() ? $user : null;
  }
}