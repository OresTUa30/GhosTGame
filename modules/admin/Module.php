<?php

namespace app\modules\admin;


use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = '/admin.php';
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action){
                            if(Yii::$app->user->identity->role ==='admin'){
                                return true;
                            }
                            else{
                                return Yii::$app->response->redirect('/');
                            }
                        }
                    ],

                ],
            ],

        ];
    }




}
