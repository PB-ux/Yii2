<?php

use yii\bootstrap4\Nav;

?>


<div class="admin-default-index">
    <h1>Административная часть</h1>
    <p>Таблицы авторы, книги, жанры</p>
    <div class="nav-bar">
        <?php
        echo Nav::widget([
            'options' => ['class' => 'nav-tabs'],
            'items' => [
                ['label' => 'Авторы', 'url' => ['/admin/author']],
                ['label' => 'Книги', 'url' => ['/admin/book']],
                ['label' => 'Жанры', 'url' => ['/admin/genre']],
            ],
        ]);
        ?>
    </div>
</div>
