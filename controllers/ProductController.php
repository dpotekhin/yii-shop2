<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 07.05.2018
 * Time: 18:16
 */

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use Yii;

class ProductController extends AppController
{

    function actionView( $id ){

        $id = Yii::$app->request->get("id");

        $product = Product::findOne( $id );
//        $product = Product::find()->with('category')->where(['id' => $id])->limit(1)->one();

        return $this->render( 'view', compact('product') );

    }
}