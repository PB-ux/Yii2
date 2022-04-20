<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
// Forms
use app\models\ReviewForm;
use app\models\SearchBook;
use app\models\AddAuthor;
use app\models\DeleteAuthor;
//Tables
use app\models\Author;
use app\models\Genre;
use app\models\Book;

class LabController extends Controller
{

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
            ]
          ]
      ]
    ];
  }

  // action infoStudent
  public function actionInfo()
  {
      return $this->render('info');
  }

  // action Lab1
  public function actionLab1()
  {
    $model = new ReviewForm();
    return $this->render('lab1', ['model' => $model]);
  }

   // action Lab2
   public function actionLab2()
   {
    // Form Search
    $modelSearch = new SearchBook();
    $modelAddAuthor = new AddAuthor();
    if($modelAddAuthor->load(Yii::$app->request->post()) && $modelAddAuthor->validate()) {
      $author = new Author();
      $author->id = $modelAddAuthor->id;
      $author->name = $modelAddAuthor->name;
      $author->lastname = $modelAddAuthor->lastname;
      $author->save();
    }
    $modelDelAuthor = new DeleteAuthor();
    if($modelDelAuthor->load(Yii::$app->request->post()) && $modelDelAuthor->validate()) {
      $author = Author::findOne($modelDelAuthor->id);
      $author->delete();
    }
    //  Ouptup Tables
    $authors = Author::find()->all();
    $genres = Genre::find()->all();
    $books = Book::find()->all();
    // Queries 
    $queryBookYear = Book::find()
              ->where(['between', 'year', '1801', '1900'])
              ->orderBy('year')
              ->all();
    $queryBookCount = Book::find()
              ->select(['COUNT(title) AS cnt', 'id_author'])
              ->groupBy('id_author')
              ->all();
    if($modelSearch->load(Yii::$app->request->post()) && $modelSearch->validate()) {
      $query = Book::find()
              ->where(['like', 'title', $modelSearch->word])
              ->all();
    }

    return $this->render('lab2', [
                'authors' => $authors, 
                'genres' => $genres, 
                'books' => $books,
                'queryBookYear' => $queryBookYear, 
                'queryBookCount' => $queryBookCount, 
                'modelSearch' => $modelSearch, 
                'modelAddAuthor' => $modelAddAuthor, 
                'modelDelAuthor' => $modelDelAuthor,
                'query' => $query,
              ]);
   }

    // action Lab3
  public function actionLab3()
  {
    return $this->render('lab3');
  }
}



?>