<?php

// include_once 'models/ProductModel.php';

class ProductController
{
    public function actionView($parameters)
    {
        $id = $parameters[0];

        $categories = CategoryModel::getCategoryList();
        $product = ProductModel::getOneProduct($id);

        $content = ProductModel::getInnerTemplate('views/site/product-details.php', [
            'product' => $product
        ]);
        
        $categoryMenu = ProductModel::getInnerTemplate('views/site/categories-menu.php', [
            'categories' => $categories
        ]);
        
        echo ProductModel::getMainTemplate([
            'title' => $product['name'],
            'categoryMenu' => $categoryMenu,
            'content' => $content
        ]);

        return true;
    }
}