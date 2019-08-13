<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $logo
 * @property string $phones
 * @property string $email
 * @property string $title
 * @property string $currency
 * @property string $type
 * @property string $logo_image
 * @property string $maps
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logo', 'phones', 'logo_image', 'maps'], 'required'],
            [['phones', 'logo_image', 'maps'], 'string'],
            [['logo', 'email', 'title', 'currency', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo' => 'Логотип',
            'phones' => 'Телефон',
            'email' => 'Email',
            'title' => 'Title',
            'currency' => 'Валюта',
            'type' => 'Type',
            'logo_image' => 'Картинка лого',
            'maps' => 'Карта',
        ];
    }

    public static function getSetting ($setting)
    {
        return Setting::find()->where(['type'=>'site'])->one()[$setting];
    }
}    