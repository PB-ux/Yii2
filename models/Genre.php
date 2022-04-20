<?php

namespace app\models;
use yii\db\ActiveRecord;

class Genre extends ActiveRecord
{
  public function getCustomer()
  {
    return $this->hasMany(Author::class, ['id' => 'id']);
  }
}


?>