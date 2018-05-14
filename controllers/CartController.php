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
use Yii;


class CartController extends AppController
{

    function actionAdd(){

        $id = Yii::$app->request->get('id');
        $product = Product::findOne( $id );

        if( empty($product) ){
            return;
        }

        $session = Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart( $product );

//        debug( $product );
//        debug( $session['cart'] );
//        debug( $session['cart.qty'] );
//        debug( $session['cart.sum'] );

        $this->layout = false;

        return $this->render( 'cart-modal', compact('session') );
    }
}