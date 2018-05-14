<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 14.05.2018
 * Time: 17:42
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart( $product, $qty = 1 ){
        echo 'worked!';
    }

}