<?php

class OrderModel
{
    public static function addOrder($userName, $phone, $message, $userId, $productsInCart)
    {
        $db = DB::getConnect();

        $productsInCart = json_encode($productsInCart);        

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) VALUES (:userName, :phone, :message, :userId, :productsInCart)';
        $params = [
            'userName' => $userName,
            'phone' => $phone,
            'message' => $message,
            'userId' => $userId,
            'productsInCart' => $productsInCart
        ];

        $query = $db->prepare($sql);
        $query->execute($params);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return true;
    }
}