<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 22.03.2018
 * Time: 16:07
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getProducts(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}