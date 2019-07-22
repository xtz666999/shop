<?php

class AdminProductController extends AdminBaseController
{
    // отображение списка товаров 
    public function actionIndex()
    {
        self::checkAdmin();

        $products = ProductModel::getLatestProducts(100);

        $content = ProductModel::getInnerTemplate('views/site/admin-products.php', [
            'products' => $products
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Управление товарами',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    // удаление 1 товара из БД
    public function actionDelete($params)
    {
        self::checkAdmin();

        $id = $params[0];

        if (isset($_POST['submit'])) {
            ProductModel::deleteProductById($id);

            header("Location: /admin/product");
            die;
        }

        $content = ProductModel::getInnerTemplate('views/site/admin-delete-product.php', [
            'id' => $id
        ]);

        echo ProductModel::getMainTemplate([
            'title' => 'Подтвердите удаление',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }

    // добавление товара в БД
    public function actionCreate()
    {
        self::checkAdmin();

        $res = false;
        $errors = [];
        $categories = CategoryModel::getCategoryList();        

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];            
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            // $options['image'] = $_POST['image'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recomended'] = $_POST['is_recomended'];
            $options['status'] = $_POST['status'];


            $id = ProductModel::addProduct($options);
            

          

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file(($_FILES['image']['tmp_name']), $_SERVER['DOCUMENT_ROOT'] . "/img/upload/qwerty.jpg");
            }
            
        }

        $content = ProductModel::getInnerTemplate('views/site/admin-create-product.php', [
            'categories' => $categories,
            'res' => $res,
            'errors' => $errors
        ]);
        echo ProductModel::getMainTemplate([
            'title' => 'Добавление товара',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }



    // редактирование товара в БД
    public function actionUpdate($params)
    {
        self::checkAdmin();

        $id = $params[0];
        $product = ProductModel::getOneProduct($id);
        $res = false;
        $errors = [];
        $categories = CategoryModel::getCategoryList();

        if (isset($_POST['submit'])) {

            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];            
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            // $options['image'] = $_POST['image'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recomended'] = $_POST['is_recomended'];
            $options['status'] = $_POST['status'];
            

            ProductModel::editProductById($id, $options);

            header('Location: /admin/product/');
            die;
        }

        $content = ProductModel::getInnerTemplate('views/site/admin-update-product.php', [
            'product' => $product,
            'categories' => $categories,
            'res' => $res,
            'errors' => $errors
        ]);
        echo ProductModel::getMainTemplate([
            'title' => 'Добавление товара',
            'content' => $content,
            'categoryMenu' => ''
        ]);

        return true;
    }
}
