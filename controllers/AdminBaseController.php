<?php

abstract class AdminBaseController
{
    public static function checkAdmin()
    {
        $userId = UserModel::checkLogged(); // вернет ид пользователя, или перекинет на стр входа

        $user = UserModel::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }

        die('Access denied!');
    }
}