<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $title
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
        ];
    }
}
