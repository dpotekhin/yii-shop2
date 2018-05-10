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
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryController extends AppController
{
    public function actionIndex(){
        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
//        debug( $hits);
        $this->setMeta( 'E-SHOPPER' );
        return $this->render('index', compact('hits') );
    }

    public function actionView($id){
//        $id = Yii::$app->request->get('id');
//        $products = Product::find()->where(['category_id' => $id ])->all();

        $category = Category::findOne( $id );

        if( empty($category) ){
            throw new HttpException( 404, 'Такой категории нет!');
        }

        // PAGINATION
        $query= Product::find()->where(['category_id' => $id ]);
//        $countQuery = clone $query;
        $pages = new Pagination( ['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false ] );
        $products = $query->offset( $pages->offset )->limit( $pages->limit )->all();


//        debug($products);

        $this->setMeta( 'E-SHOPPER | '.$category->name,  $category->keywords, $category->description );
        return $this->render("view", compact( 'products', 'pages', 'category' ) );
    }

    public function actionSearch(){

        $q = trim( Yii::$app->request->get('q') );

        $this->setMeta( 'E-SHOPPER | Поиск: '.$q );

        if( !$q ){
            return $this->render( "search" );
        }

        $query = Product::find()->where(['like', 'name', $q ]);
        $pages = new Pagination( ['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false ] );
        $products = $query->offset( $pages->offset )->limit( $pages->limit )->all();

        return $this->render( "search", compact('products', 'pages', 'q') );
    }

}