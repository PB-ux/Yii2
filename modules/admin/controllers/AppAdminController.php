<?php

namespace app\modules\admin\controllers;
use yii\web\controller;
use yii\filters\AccessControl;


class AppAdminController extends Controller {
  
  public function behaviors()
  {
    return 
    [
      'access' => [
          'class' => AccessControl::class,
          'rules' => [
            [
              'allow' => true,
              'roles' => ['@']
            ],
          ]
      ]
    ];
  }
}