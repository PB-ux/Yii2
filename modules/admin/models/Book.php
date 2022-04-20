<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property int $id_author
 * @property int $year
 * @property int $id_genre
 */
class Book extends \yii\db\ActiveRecord
{

    public function getAuthor() { 
        return $this->hasOne(Author::class, ['id' => 'id_author']);
    }

    public function getAuthorName()
    {
        $author = $this->author;

        return $author ? $author->lastname : '';
    }
    
    public function getGenre() {
        return $this->hasOne(Genre::class, ['id' => 'id_genre']);
    }

    public function getGenreName()
    {
        $genre = $this->genre;

        return $genre ? $genre->title : '';
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'id_author', 'year', 'id_genre'], 'required'],
            [['id_author', 'year', 'id_genre'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер идентификатора',
            'title' => 'Название',
            'id_author' => 'Автор',
            'year' => 'Год написания',
            'id_genre' => 'Жанр',
        ];
    }
}
