<?php

class AdminCategoryController extends AdminBaseController
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categories = CategoryModel::getCategoryList();

        $content = ProductModel::getInnerTemplate('views/site/admin-category.php', [
            'categories' => $categories
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Редактирование списка категорий товаров',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    public function actionDelete($params)
    {
        self::checkAdmin();

        $id = $params[0];

        $category = CategoryModel::getCategoryById($id);
       
        if (!empty($_POST)) {
            CategoryModel::deleteCategoryById($id);
            header('Location: /admin/category/');
            die;
        }

        $content = ProductModel::getInnerTemplate('views/site/admin-delete-category.php', [
            'category' => $category
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Подтверждение удаления',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    public function actionUpdate($params)
    {
        self::checkAdmin();

        $id = $params[0];

        $category = CategoryModel::getCategoryById($id);

        if (!empty($_POST)) {

            $params['newName'] = trim($_POST['name']);
            $params['newSortOrder'] = trim($_POST['sort_order']);
            $params['newStatus'] = trim($_POST['status']);
        
            $result = CategoryModel::updateCategory($id, $params);

            if ($result) {
                header('Location: /admin/category/');
                die;
            }
        }
        
        $content = ProductModel::getInnerTemplate('views/site/admin-update-category.php', [
            'category' => $category
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Редактирование категории',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    public function actionCreate()
    {
        if (isset($_POST['submit'])) {
            $params['name'] = trim($_POST['name']);  
            $params['sort_order'] = trim($_POST['sort_order']);  
            $params['status'] = trim($_POST['status']);         

            $result = CategoryModel::createCategory($params);

            if ($result) {
                header('Location: /admin/category/');
                die;
            }
        }

        $content = ProductModel::getInnerTemplate('views/site/admin-create-category.php');

        echo ProductModel::getMainTemplate([
            'title' => 'Добавление категории',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }
}