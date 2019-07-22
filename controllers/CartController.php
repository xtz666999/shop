<?php

class CartController
{
    // страница корзины
    public function actionIndex()
    {
        $products = Cart::getProductsInCart();
        $productsFull = ProductModel::getProdictsByIds($products);

        $sum = 0;

        // вычисление общей стоимости товаров
        foreach ($productsFull as $one) {
            $sum += $one['price'] * $one['quantity'];
        }

        $content = ProductModel::getInnerTemplate('views/site/cart.php', [
            'productsFull' => $productsFull,
            'sum' => $sum
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Корзина',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    // страница оформления покупки
    public function actionCheckout()
    {
        $productsInCart = Cart::getProductsInCart();

        // если корзина пуста - редирект на главную
        if (empty($productsInCart)) {
            header('Location: /');
            die;
        }

        // проверим авторизован ли пользователь
        if (UserModel::isGuest()) {
            $userName = '';
        } else {
            $userId = $_SESSION['user'];
            $user = UserModel::getUserById($userId);
            $userName = $user['name'];
        }

        $productsFull = ProductModel::getProdictsByIds($productsInCart);        

        $sum = 0;
        $quantity = 0;
        $errors = [];
        $res = false;

        // вычисление общей стоимости товаров и количества товаров
        foreach ($productsFull as $one) {
            $sum += $one['price'] * $one['quantity'];
            $quantity += $one['quantity'];
        }

        if (isset($_POST['submit'])) {

            $userName = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $message = trim($_POST['message']);
            $userId = $_SESSION['user'] ?? false;

            
            // ВАЛИДАЦИЯ ФОРМЫ

            // если форма прошла валидацию, сохраним заказ в БД
            if (empty($errors)) {                
                $res = OrderModel::addOrder($userName, $phone, $message, $userId, $productsInCart);               
            }

            if ($res) {
                // ОТПРАВКА ЕМЭЙЛ АДМИНУ О ЗАКАЗЕ

                // чистим карт
                Cart::clear();
            }
        }

        $content = ProductModel::getInnerTemplate('views/site/checkout.php', [
            'sum' => $sum,
            'quantity' => $quantity,
            'errors' => $errors,
            'userName' => $userName,
            'res' => $res
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Оформление заказа',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    // добавление товара в карзину
    public function actionAdd($params)
    {
        $productId = $params[0];

        Cart::addProduct($productId);

        // страница с которой пришел пользователь
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    public function actionDelete($params)
    {
        $productId = $params[0];

        $productsInCart = Cart::getProductsInCart();
        unset($productsInCart[$productId]);

        $_SESSION['products'] = $productsInCart;

        $refferer = $_SERVER['HTTP_REFERER'];

        header("Location: $refferer");




        echo $productId;
        die;
        return true;
    }
}
