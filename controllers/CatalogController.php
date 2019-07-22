<?php

// include_once 'models/ProductModel.php';
// include_once 'models/CategoryModel.php';
// include_once 'components/DB.php';

class CatalogController
{
    public function actionIndex()
    {
        $products = ProductModel::getLatestProducts(12);
        $categories = CategoryModel::getCategoryList();

        $content = ProductModel::getInnerTemplate('views/site/catalog.php', [
            'products' => $products
        ]);

        $categoryMenu = ProductModel::getInnerTemplate('views/site/categories-menu.php', [
            'categories' => $categories
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Каталог',
            'categoryMenu' => $categoryMenu,
            'content' => $content
        ]);

        return true;
    }

    // вывод товаров по категориям
    public function actionCategory($parameters)
    {
        $categoryId = $parameters[0];
        $page = $parameters[1] ?? 1;            

        $categories = CategoryModel::getCategoryList();
        $productsByCategory = ProductModel::getProductByCategory($categoryId, $page);

        $content = ProductModel::getInnerTemplate('views/site/categories.php', [
            'productsByCategory' => $productsByCategory
        ]);

        $categoryMenu = ProductModel::getInnerTemplate('views/site/categories-menu.php', [
            'categories' => $categories
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Каталог',
            'categoryMenu' => $categoryMenu,
            'content' => $content
        ]);

        return true;
    }
}