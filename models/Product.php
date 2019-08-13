<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $screen1
 * @property string $screen2
 * @property string $screen3
 * @property string $meta_description
 * @property string $name
 * @property string $category_id
 * @property string $short_content
 * @property string $content
 * @property double $price
 * @property int $stock
 * @property int $new
 * @property int $status
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'screen1', 'screen2', 'screen3', 'short_content', 'content'], 'string'],
            [['price'], 'number'],
            [['stock', 'new', 'status'], 'integer'],
            [['new'], 'required'],
            [['title', 'meta_description', 'name'], 'string', 'max' => 255],
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
            'image' => 'Постер',
            'screen1' => 'Скриншот1',
            'screen2' => 'Скриншот2',
            'screen3' => 'Скриншот3',
            'meta_description' => 'Описание',
            'name' => 'Название',
            'category_id' => 'ID Категории',
            'short_content' => 'Краткое описание',
            'content' => 'Контент',
            'price' => 'Цена',
            'status' => 'Статус',
            'stock' => 'Aкция',
            'new' => 'Новинка',
        ];
    }
    public static function getProductsByIds($ids)
    {
        return Product::find()->select(['id', 'name', 'price'])->where(['in', 'id', $ids])->all();
    }
}
