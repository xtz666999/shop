<?php

class UserController
{
    // страница регистрация пользователей
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $res = false;

        $errors = array();         

        if (isset($_POST['submit'])) {

            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (UserModel::checkName($name)) {
                $errors[] = 'Incorrect login';
            }

            if (!UserModel::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }

            if (UserModel::checkPass($password)) {
                $errors[] = 'Incorrect password';                
            }

            if (!UserModel::checkEmailExists($email)) {                   
                $errors[] = 'Email already exists';                
            }

            // записываем юзера в БД
            if (empty($errors)) {
                $res = UserModel::register($name, $email, $password); //true or false
            }
        }

        $content = ProductModel::getInnerTemplate('views/site/register.php', [
            'name' => $name,
            'email' => $email,
            'res' => $res,
            'errors' => $errors
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Регистрация',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    // вход пользователя
    public function actionLogin()
    {
        $email = '';
        $errors = array();   
        $userId = false; 

        if (isset($_POST['submit'])) {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!UserModel::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }

            if (UserModel::checkPass($password)) {
                $errors[] = 'Incorrect password';
            }

            $userId = UserModel::checkUserData($email, $password); //id or false           

            if ($userId != false) {
                
                UserModel::auth($userId);
                header('Location: /cabinet');
            } else {
                $errors[] = 'Ошибка авторизации';
            }
        };        

        $content = ProductModel::getInnerTemplate('views/site/login.php', [
            'errors' => $errors,
            'userId' => $userId
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Вход',
            'content' => $content,            
            'categoryMenu' => ''
        ]);

        return true;    
    }

    // logout
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /');

    }
}
