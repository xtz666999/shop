<?php

class Cart
{
    // добавить товар в корзину
    // товары хранятся в сессии массиве, где ключ - id товара, значение - количество товара
    public static function addProduct($productId)
    {
        $id = (int) $productId;

        $cartProduct = [];

        if (isset($_SESSION['products'])) {
            $cartProduct = $_SESSION['products'];
        } 

        if (array_key_exists($id, $cartProduct)) {
            $cartProduct[$id]++;
        } else {
            $cartProduct[$id] = 1;
        }

        $_SESSION['products'] = $cartProduct;        
    }

    // количество товара в корзине
    public static function countItems()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProductsInCart()
    {
        return  $_SESSION['products'] ?? [];
    }

    // отчистка карзины
    public static function clear()
    {
        unset($_SESSION['products']);
    }
}