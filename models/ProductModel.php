<?php

// include_once 'components/DB.php';

class ProductModel
{
    const SHOW_BY_DEFAULT = 10;

    // выбирает товары из бд для главной стр
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $db = DB::getConnect();

        $sql = sprintf("SELECT * FROM products WHERE status = '1' ORDER BY id LIMIT %d", $count);
       
        $query = $db->prepare($sql);
        
        $query->execute();
        
        $products = $query->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    // выбор одного товара
    public static function getOneProduct($id)
    {
        $db = DB::getConnect();

        $sql = sprintf("SELECT * FROM products WHERE id = %d", $id);
        
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // получаем массив с полным описанием товара из БД и добавляем количество
    public static function getProdictsByIds($productsIds)
    {
        $productsFull = [];

        foreach ($productsIds as $productId => $quantity) {
            $item = self::getOneProduct($productId);
            $item['quantity'] = $quantity;
            $productsFull[] = $item;
        }

        return $productsFull;
    }

    // выбор товара по категории
    public static function getProductByCategory(int $categoryId, int $page = 1)
    {
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = DB::getConnect();

        $sql = sprintf("SELECT * FROM products WHERE category_id = %d AND status = '1' ORDER BY id DESC LIMIT %d OFFSET %d", $categoryId, self::SHOW_BY_DEFAULT, $offset);

        $query = $db->prepare($sql);
        $query->execute();

        $productsByCategory = $query->fetchAll(PDO::FETCH_ASSOC);

        return $productsByCategory;        
    }

    // ШАБЛОНЫ
    public static function getInnerTemplate(string $path, array $params = [])
    {
        extract($params); //разобъет масссив на переменные
        ob_start(); // отсюда начинается буферизация    
        include($path); // содержимое, попадающее в буфер
        $res = ob_get_clean(); //конец буферизации
        return $res; //вернет строку
    }

    public static function getMainTemplate($params = [])
    {
        return self::getInnerTemplate('views/site/main.php', $params);
    }

    // удаление товара
    public static function deleteProductById($id)
    {
        $db = DB::getConnect();

        $sql = 'DELETE FROM products WHERE id = :id';
        $params = [
            'id' => $id
        ];

        $query = $db->prepare($sql);
        $query->execute($params);
    }

    // добавление товара
    public static function addProduct(array $options)
    {
        $db = DB::getConnect();

        $sql = 'INSERT INTO products (name, category_id, code, price, availability, brand, image, description, is_new, is_recomended, status) VALUES (:name, :category_id, :code, :price, :availability, :brand, :image, :description, :is_new, :is_recomended, :status)';

        $query = $db->prepare($sql);

        $query->execute([
            'name' => $options['name'],
            'category_id' => $options['category_id'],
            'code' => $options['code'],
            'price' => $options['price'],
            'availability' => $options['availability'],
            'brand' => $options['brand'],
            'image' => 'TEMP',
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recomended' => $options['is_recomended'],
            'status' => $options['status']
        ]);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return $db->lastInsertId();
    }

    // редактирование товара
    public static function editProductById($id, array $options)
    {
        $db = DB::getConnect();

        $sql = 'UPDATE products SET name = :name, category_id = :category_id, code = :code, price = :price, availability = :availability, brand = :brand, image = :image, description = :description, is_new = :is_new, is_recomended = :is_recomended, status = :status WHERE id = :id';

        $query = $db->prepare($sql);
        $query->execute([
            'id' => $id,
            'name' => $options['name'],
            'category_id' => $options['category_id'],
            'code' => $options['code'],
            'price' => $options['price'],
            'availability' => $options['availability'],
            'brand' => $options['brand'],
            'image' => $options['image'],
            'description' => $options['description'],
            'is_new' => $options['is_new'],
            'is_recomended' => $options['is_recomended'],
            'status' => $options['status']
        ]);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return true;
    }
}
