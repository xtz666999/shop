<?php

class UserModel
{

    // получить пользователя по ид
    public static function getUserById($id)
    {
        $db = DB::getConnect();

        $sql = 'SELECT * FROM users WHERE id = :id';

        $query = $db->prepare($sql);
        $params = [
            'id' => $id
        ];

        $query->execute($params);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // регистрация пользователя
    public static function register($name, $email, $password)
    {
        $db = DB::getConnect();

        $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
        $params = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $query = $db->prepare($sql);
        return $query->execute($params);
    }

    // валидация имени пользователя
    public static function checkName($name)
    {
        return (mb_strlen($name) < 2);
    }

    // валидация длины сообщения
    public static function checkMsg($message)
    {
        return (mb_strlen($message) < 10);
    }
    
    // валидация пароля
    public static function checkPass($pass)
    {
        return (mb_strlen($pass) < 6);
    }

    // валидация емели
    public static function checkEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // проверка существует ли емэйл в БД
    public static function checkEmailExists($email)
    {
        $db = DB::getConnect();
        $sql = sprintf("SELECT * FROM users WHERE email = '%s'", $email);       
        
        $query = $db->prepare($sql);

        $query->execute();

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        $res = $query->fetch();

        if (empty($res)) {
            return true;
        } else {
            return false;
        }        
    }

    // проверка логина пароля пользователя для авторизации
    public static function checkUserData($email, $password)
    {
        $db = DB::getConnect();


        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $params = [
            'email' => $email,
            'password' => $password
        ];

        $query = $db->prepare($sql);
        $query->execute($params);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        $res = $query->fetch();

        if (!empty($res)) {
            return $res['id'];
        } else {
            return false;
        }
    }

    public static function auth($userId)
    {
        session_start();
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header('Location: /login');
    }

    // авторизован ли пользователь
    public static function isGuest()
    {   
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    // редактирование данных пользователя
    public static function editUserData($userId, $name, $email, $password)
    {
        $db = DB::getConnect();

        $sql = 'UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id';
        $params = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'id' =>$userId
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