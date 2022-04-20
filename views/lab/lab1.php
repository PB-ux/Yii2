<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h2 class="alert alert-success">Лабораторная работа №1</h2>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="review__form">
          <h4>Отзыв о ресторане</h4>
          <?php $form = ActiveForm::begin(); ?>
              <?= $form->field($model, 'name')->label('Ваше имя:') ?>
              <?= $form->field($model, 'email')->label('Ваш email:') ?>
              <?= $form->field($model, 'dataVisit')->input('date')->label('Дата посещения:') ?>
              <?= $form->field($model, 'age')->label('Ваш возраст:') ?>
              <?=$form->field($model, 'categoryFood')->dropdownList([
                  1 => 'Русская', 
                  2 => 'Итальянская',
                  3 => 'Американская'
              ],
              ['prompt'=>'Выберите категорию']
              )->label('Любимая кухня:')
              ?>
              <?= $form->field($model, 'radioRecomFriend')->radioList([
              1 => 'Да', 
              2 => 'Нет'
              ])->label('Порекомендуете нам друзьям?')?>
              <?= $form->field($model, 'review')->textarea()->label('Текст отзыва:') ?>
              <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
              </div>
          <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="col">
      <?php if($model->load(Yii::$app->request->post()) && $model->validate()) {?>
        <div class="review">
          <h4>Переданный отзыв</h4>
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="row"> Ваше имя: </th>
                    <td><?= Html::encode($model->name) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Ваше email: </th>
                    <td><?= Html::encode($model->email) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Дата посещения: </th>
                    <td> <?= Html::encode($model->dataVisit) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Ваш возраст: </th>
                    <td><?= Html::encode($model->age) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Любимая кухня: </th>
                    <td><?= Html::encode($model->categoryFood) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Порекомендуете друзьям? </th>
                    <td><?= Html::encode($model->radioRecomFriend) ?> </td>
                  </tr>
                  <tr>
                    <th scope="row"> Текст отзыва: </th>
                    <td><?= Html::encode($model->review) ?> </td>
                  </tr>
                </tbody>
            </table>
        </div>
      <?php } ?>
    </div>
  </div>
</div>