<?php
/**
 * Created by PhpStorm.
 * User: dpotekhin
 * Date: 07.05.2018
 * Time: 15:25
 */

namespace app\controllers;


use yii\web\Controller;

class AppController extends Controller
{

    protected function setMeta( $title = null, $keywords = null, $description = null )
    {
        $this->view->title  = $title;
        $this->view->registerMetaTag( [ 'name' => 'keywords', 'content' => "$keywords" ] );
        $this->view->registerMetaTag( [ 'name' => 'description', 'content' => "$description" ] );
    }
}