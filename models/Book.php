<?php

namespace app\models;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
  public $cnt; // field Count(title) as cnt
  
  public function getAuthor() { 
    return $this->hasOne(Author::class, ['id' => 'id_author']);
  }

  public function getGenre() {
    return $this->hasOne(Genre::class, ['id' => 'id_genre']);
  }
}


?>