<?php

// include_once 'models/ProductModel.php';
// include_once 'models/CategoryModel.php';

class SiteController
{
    // главная страница
    public function actionIndex()
    {
        $products = ProductModel::getLatestProducts(9);
        $categories = CategoryModel::getCategoryList();           

        $content =  ProductModel::getInnerTemplate('views/site/products-grid.php', [
            'products' => $products
        ]);

        $categoryMenu = ProductModel::getInnerTemplate('views/site/categories-menu.php', [
            'categories' => $categories
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'МАГАЗИН',
            'categoryMenu' => $categoryMenu,
            'content' => $content
        ]);

        return true;
    }

    // страница обратной связи
    public function actionContacts()
    {
        $errors = [];
        $res = false;

        if (isset($_POST['submit'])) {

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            if (UserModel::checkName($name)) {
                $errors[] = 'Incorrect name';
            }

            if (!UserModel::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }

            if (UserModel::checkMsg($message)) {
                $errors[] = 'Incorrect message';
            }

            if (empty($errors)) {
                
                $adminEmail = 'admin@localhost.local';
                $emailMessage = "Текст: {$message}. От {$email}";
                $subject = 'Сообщение с сайта';
                $res = mail($adminEmail, $subject, $emailMessage);
            }
        }

        $content = ProductModel::getInnerTemplate('views/site/contacts.php', [
            'errors' => $errors,
            'res' => $res
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Обратная связь',
            'content' => $content,
            'categoryMenu' => ''
            
        ]);

        return true;
    }

}