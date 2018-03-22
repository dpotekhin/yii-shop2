<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 22.03.2018
 * Time: 16:17
 */

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}