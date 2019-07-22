<?php

class AdminController extends AdminBaseController
{
    public function actionIndex()
    {
       self::checkAdmin();


        $content = ProductModel::getInnerTemplate('views/site/admin.php');

        echo ProductModel::getMainTemplate([
            'title' => 'Панель администратора',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;    
    }
}