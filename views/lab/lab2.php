<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Book;
?>

<h1 class="alert alert-success">Лабораторная работа №2</h1>

<div class="container">
  
  <!-- Таблицы авторы и жанры -->
  <div class="row">
    <div class="col">
      <h3>Таблица авторы</h3>
      <table class="table table-striped">
        <!-- Заголовки таблицы -->
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
          </tr>
        </thead>
        <!-- Тело таблицы -->
        <tbody>
          <?php foreach ($authors as $author): ?>
            <tr>
                <th scope="row"> <?= Html::encode("{$author->id}") ?> </th>
                <td> <?= Html::encode("{$author->name}") ?> </td>
                <td> <?= Html::encode("{$author->lastname}") ?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="col">
      <h3>Таблица жанры</h3>
      <table class="table table-striped">
        <!-- Заголовки таблицы -->
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Название жанра</th>
          </tr>
        </thead>
        <!-- Тело таблицы -->
        <tbody>
          <?php foreach ($genres as $genre): ?>
            <tr>
                <th scope="row"> <?= Html::encode("{$genre->id}") ?> </th>
                <td> <?= Html::encode("{$genre->title}") ?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
       </table>
    </div>
  </div>

  <!-- Таблица книги -->
  <div class="row">
    <div class="col">
      <h3>Таблица книги</h3>
      <table class="table table-striped">
        <!-- Заголовки таблицы -->
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Название книги</th>
            <th scope="col">Автор</th>
            <th scope="col">Жанр</th>
            <th scope="col">Год написания</th>
          </tr>
        </thead>
        <!-- Тело таблицы -->
        <tbody>
          <?php foreach ($books as $item): ?>
            <tr>
              <th scope="row"> <?= Html::encode("{$item->id}") ?> </th>
              <td> <?= Html::encode("{$item->title}") ?> </td>
              <td> <?= Html::encode("{$item->author->lastname}") ?> </td>
              <td> <?= Html::encode("{$item->genre->title}") ?> </td>
              <td> <?= Html::encode("{$item->year}") ?> </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Запросы -->
  <div class="row">
    <div class="col">
      <h3>Выполнения запросов</h3>
      <div class="queries">
        <p>1. Книги, написанные в 19 веке.</p>
        <table class="table table-striped">
          <!-- Заголовки таблицы -->
          <thead>
            <tr>
              <th scope="col">Название книги</th>
              <th scope="col">Автор</th>
              <th scope="col">Жанр</th>
              <th scope="col">Год написания</th>
            </tr>
          </thead>
          <!-- Тело таблицы -->
          <tbody>
            <?php foreach ($queryBookYear as $item): ?>
              <tr>
                <td> <?= Html::encode("{$item->title}") ?> </td>
                <td> <?= Html::encode("{$item->author->lastname}") ?> </td>
                <td> <?= Html::encode("{$item->genre->title}") ?> </td>
                <td> <?= Html::encode("{$item->year}") ?> </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <p>2. Авторы и количество написанных ими книг</p>
        <table class="table table-striped">
           <!-- Заголовки таблицы -->
            <thead>
              <tr>
                <th scope="col">Автор</th>
                <th scope="col">Количество книг</th>
              </tr>
            </thead>
            <!-- Тело таблицы -->
            <tbody>
              <?php foreach ($queryBookCount as $item): ?>
                <tr>
                  <td> <?= Html::encode("{$item->author->lastname}") ?> </td>
                  <td> <?= Html::encode("{$item->cnt}") ?> </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
        </table>

        <p>3. Поиск книг по слову</p>
        <?php $form = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'search'
                ]
            ]
            ); ?>

          <?= $form->field($modelSearch, 'word')->label('Поиск') ?>

          <div class="form-group">
              <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
          </div>

        <?php ActiveForm::end(); ?>
        <?php if($modelSearch->load(Yii::$app->request->post()) && $modelSearch->validate()) { ?>
          <table class="table table-striped">
              <!-- Заголовки таблицы -->
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Название книги</th>
                  <th scope="col">Автор</th>
                  <th scope="col">Жанр</th>
                  <th scope="col">Год написания</th>
                </tr>
              </thead>
              <!-- Тело таблицы -->
              <tbody>
                  <tr>
                    <?php foreach ($query as $i): ?>
                      <td> <?= Html::encode("{$i->id}") ?> </td>
                      <td> <?= Html::encode("{$i->title}") ?> </td>
                      <td> <?= Html::encode("{$i->author->lastname}") ?> </td>
                      <td> <?= Html::encode("{$i->genre->title}") ?> </td>
                      <td> <?= Html::encode("{$i->year}") ?> </td>
                  <?php endforeach; ?>
                  </tr>
              </tbody>
          </table>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <!-- Форма добавления автора -->
  <div class="row">
    <div class="col">
      <h3>Добавление нового автора</h3>
      <?php $form = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'author-add'
                ]
            ]
            ); ?>

        <?= $form->field($modelAddAuthor, 'id')->label('Номер идентификатора') ?>
        <?= $form->field($modelAddAuthor, 'name')->label('Имя автора') ?>
        <?= $form->field($modelAddAuthor, 'lastname')->label('Фамилия автора') ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>
    </div>
  </div>

  <!-- Форма удаления автора -->
  <div class="row">
    <div class="col">
      <h3>Удаление автора по номеру идентификатора</h3>
      <?php $form = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'author-del'
                ]
            ]
            ); ?>

        <?= $form->field($modelDelAuthor, 'id')->label('Номер идентификатора') ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>

      <?php ActiveForm::end(); ?>
    </div>
  </div>

</div>

