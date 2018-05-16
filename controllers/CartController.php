<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 14.05.2018
 * Time: 17:39
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use app\models\Order;
use app\models\OrderItems;
use Yii;


class CartController extends AppController
{

    public function actionShow(){

        $session = Yii::$app->session;
        $session->open();

        $this->layout = false;
        return $this->render( 'cart-modal', compact('session') );
    }

    public function actionAdd(){

        $id = Yii::$app->request->get('id');
        $qty = (int) Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        $product = Product::findOne( $id );

        if( empty($product) ){
            return;
        }

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart( $product, $qty );

//        debug( $product );
//        debug( $session['cart'] );
//        debug( $session['cart.qty'] );
//        debug( $session['cart.sum'] );

        if( !Yii::$app->request->isAjax ){
            return $this->redirect( Yii::$app->request->referrer );
        }

        $this->layout = false;
        return $this->render( 'cart-modal', compact('session') );
    }


    public function actionClear(){
        $session = Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        $this->layout = false;
        return $this->render( 'cart-modal', compact('session') );
    }

    public function actionDelItem(){

        $id = Yii::$app->request->get('id');

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc( $id );

        $this->layout = false;
        return $this->render( 'cart-modal', compact('session') );
    }

    public function actionView(){

        $session = Yii::$app->session;
        $session->open();

        $this->setMeta('Корзина');

        $order = new Order();
        if( $order->load( Yii::$app->request->post() ) ){
            debug( Yii::$app->request->post() );
        }

        return $this->render('view', compact('session', 'order' ));
    }

}