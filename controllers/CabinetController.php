<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = UserModel::checkLogged();

        $user = UserModel::getUserById($userId); //array
        
        $content = ProductModel::getInnerTemplate('views/site/cabinet.php', [
            'user' => $user 
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Личный кабинет',
            'categoryMenu' => '',
            'content' => $content
        ]);

        return true;
    }

    // редактирование данных пользователя
    public function actionEdit($params)
    {
        $errors = [];
        $userId = $params[0];
        $res = false;
        
        $user = UserModel::getUserById($userId);

        $name = $user['name'];
        $name = $user['email'];

        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!UserModel::checkEmail($email)) {
                $errors[] = 'Incorrect email';
            }

            if (UserModel::checkPass($password)) {
                $errors[] = 'Incorrect password';
            }

            if (empty($errors)) {
                $res = UserModel::editUserData($userId, $name, $email, $password);
            }
        }

        $content = ProductModel::getInnerTemplate('views/site/edit-user-data.php', [
            'user' => $user,
            'errors' => $errors,
            'res' => $res
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Редактирование личных данных',
            'categoryMenu' => '',
            'content' => $content
        ]);
        
        return true;
    }
}