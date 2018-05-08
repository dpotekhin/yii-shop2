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

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();

        $this->setMeta( 'E-SHOPPER | '.$product->name,  $product->keywords, $product->description );

        return $this->render( 'view', compact('product', 'hits') );

    }
}