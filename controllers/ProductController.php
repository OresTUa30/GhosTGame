<?php


namespace app\controllers;


use app\models\Comments;
use app\models\Product;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $dataProvider  = new ActiveDataProvider([
            'query' => Product::find()->where(['status' => 1]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        return $this->render('/product/view', ['dataProvider' => $dataProvider ]);

    }

    public function actionShow($id)
    {
        $product = Product::find()->where(['id'=>$id])->one();
        $comment = new Comments();
        if($comment->load(Yii::$app->request->post())){
            $comment->product_id = $product->id;
            $comment->user_id = Yii::$app->user->id;
            $comment->save();
            return $this->refresh();
        }
        return $this->render('/product/show', ['product' => $product,'comment' => $comment]);
    }

    public function actionStock()
    {
        $dataProvider  = new ActiveDataProvider([
            'query' => Product::find()->where(['status' => 1, 'stock' =>1]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        return $this->render('/product/view_stock', ['dataProvider' => $dataProvider ]);

    }

    public function actionNew()
    {
        $dataProvider  = new ActiveDataProvider([
            'query' => Product::find()->where(['status' => 1, 'new' =>1]),
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);

        return $this->render('/product/view_new', ['dataProvider' => $dataProvider ]);

    }

}