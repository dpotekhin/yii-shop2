<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 07.05.2018
 * Time: 15:24
 */

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
//        debug( $hits);
        return $this->render('index', compact('hits') );
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id ])->all();
//        debug($products);
        return $this->render("view", compact( "products") );
    }

}