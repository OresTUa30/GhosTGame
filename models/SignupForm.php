<?php


namespace app\models;
use yii\base\Model;


class SignupForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [

            [['username', 'password'], 'required'],
            [['username'], 'unique', 'targetClass' => User::className(), 'message' => 'Такой логин зарегистрирован']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',

        ];
    }
}