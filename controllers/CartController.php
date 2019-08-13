<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;




class CartController extends Controller
{

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }

    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();
        $order = new Order;
        if($order->load(Yii::$app->request->post()))
        {
            if (Yii::$app->user->isGuest){
                $order->user_id = 0;
            }else{
                $order->user_id = Yii::$app->user->id;

            }
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            if($order->save()){
                $this->saveOrderItems($session['cart'], $order->id);
                Yii::$app->session->setFlash('success', 'Ваш заказ принят на обработку');
                Yii::$app->mailer->compose('order' ,['session' => $session])
                    ->setFrom(['orestukraine1991@gmail.com' => 'GhosTGame shop'])
                    ->setTo($order->email)
                    ->setSubject('Ваш заказ номер:'.' '. $order->id)
                    ->send()
                ;
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                return $this->refresh();
            }
            else{
                Yii::$app->session->setFlash('error', 'Ошыбка в оформлении');
            }
        }
        return $this->render('/cart/index',compact('session','order'));
    }

    public function actionShow()
    {
        $session = Yii::$app->session;
        $session->open();
        $this->layout = false;
        return $this->render('/cart/cart-modal', compact('session'));
    }

    public function actionAdd()
    {
       $id = Yii::$app->request->get('id');
       $qty = (int)Yii::$app->request->get('qty');
       $qty = !$qty ? 1 : $qty;
       $product = Product::find()->where(['id' =>$id])->one();
        if(empty($product)){
           return false;
       }
       $session = Yii::$app->session;
       $session->open();
       $cart = new Cart;
       $cart->addToCart($product, $qty);
       $this->layout = false;
       return $this->render('/cart/cart-modal', compact('session'));
    }

    public function actionClear()
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
        return $this->render('/cart/cart-modal', compact('session'));
    }

    public function actionClearIndex() // на очистку корзины без
    {
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');
        $this->layout = false;
       return $this->redirect('/cart/index');
    }

    public function actionDelItem()
    {
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart;
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('/cart/cart-modal', compact('session'));

    }

    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id =>$item)
        {
            $order_items = new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $id;
            $order_items->name = $item['name'];
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();
        }
    }

    public function actionLoad()
    {
        $quantity = $_SESSION['cart.qty'];
        $sum = $_SESSION['cart.sum'];

        return $this->render('layout/main',['quantity' => $quantity, 'sum' => $sum]);
    }

}