<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

use yii\filters\VerbFilter;

use app\models\Product;
use yii\data\ActiveDataProvider;


class CategoryController extends Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $dataProvider  = new ActiveDataProvider([
            'query' => Category::find()->where(['status' => 1]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('/category/index', ['dataProvider' => $dataProvider ]);
    }


    public function actionShow($id)
    {
        $dataProvider  = new ActiveDataProvider([
            'query' => Product::find()->where(['status' => 1])->andwhere(['category_id' => $id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('/category/view', ['category_pr' => $dataProvider ]);

    }

    
    protected function registerMeta($model)
    {
        $view = Yii::$app->view;
        $view->title = $model->meta_title;
        $view->registerMetaTag(['name' => 'description', 'content' => $model->meta_description]);
    }




}
