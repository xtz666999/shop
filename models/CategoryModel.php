<?php


class CategoryModel
{
    // список категорий для меню
    public static function getCategoryList()
    {
        $db = DB::getConnect();

        $sql = "SELECT * FROM category ORDER BY sort_order ASC";
        $query = $db->prepare($sql);
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public static function getCategoryById($id)
    {
        
        $db = DB::getConnect();        

        $sql = 'SELECT * FROM category WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $id
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteCategoryById($id)
    {
        $db = DB::getConnect();

        $sql = 'DELETE FROM category WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute([
            'id' => $id
        ]);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return $query->rowCount();
    }


    public static function updateCategory($id, $params)
    {
        $db = DB::getConnect();

        $sql = 'UPDATE category SET name = :name, sort_order = :sort_order, status = :status WHERE id = :id';

        $query = $db->prepare($sql);
        $query->execute([
            'name' => $params['newName'],
            'sort_order' => $params['newSortOrder'],
            'status' => $params['newStatus'],
            'id' => $id
        ]);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return $query->rowCount();
    }

    public static function createCategory(array $params)
    {
        $db = DB::getConnect();

        $sql = 'INSERT INTO category (name, sort_order, status) VALUES (:name, :sort_order, :status)';
        $query = $db->prepare($sql);
        
        $query->execute([
            'name' => $params['name'],
            'sort_order' => $params['sort_order'],
            'status' => $params['status']
        ]);

        if ($query->errorCode() != PDO::ERR_NONE) {
            $error = $query->errorInfo(); // вернет массив с ошибками
            print_r($error);
            die;
        }

        return $query->rowCount();
    }

    
}