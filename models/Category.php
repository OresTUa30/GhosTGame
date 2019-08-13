<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_description
 * @property string $short_content
 * @property string $content
 * @property int $status
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'status'], 'required'],
            [['short_content', 'content'], 'string'],
            [['status'], 'integer'],
            [['title', 'meta_title', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'meta_title' => 'Подзаголовок',
            'meta_description' => 'Мета описание',
            'short_content' => 'Мета контент',
            'content' => 'Контент',
            'status' => 'Статус',
        ];
    }

    public static function getCategoryTitle ($id)
    {
        $category = Category::find()->where(['id'=> $id])->one();
        return $category->title;
    }

}
