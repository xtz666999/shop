<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">

                    <? if ($res) : ?>
                        <p>Товар добавлен</p>
                        <a href="/">На главную</a>
                    <? else : ?>
                        <h2>Редактирование товара</h2>
                        <form action="" method="post" enctype="multipart/form-data">

                            <label for="name">Название товара</label>
                            <input type="text" placeholder="Название товара" name="name" id="name" value="<?=$product['name']?>">

                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id">

                                <? foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <? endforeach; ?>

                            </select>

                            <label for="code" style="margin-top: 15px">Артикул</label>
                            <input type="text" placeholder="Артикул" name="code" id="code" value="<?=$product['code']?>">

                            <label for="price">Стоимость</label>
                            <input type="text" placeholder="Стоимость" name="price" id="price" value="<?=$product['price']?>">  
                            
                            <label for="availability">Наличие на складе</label>
                            <select name="availability" id="availability">                                
                                <option value="0" <? if ($product['availability'] == 1) echo ' selected'?>>Да</option>
                                <option value="1" <? if ($product['availability'] == 0) echo ' selected'?>>Нет</option>
                            </select>

                            <label for="brand" style="margin-top: 15px">Производитель</label>
                            <input type="text" placeholder="Производитель" name="brand" id="brand" value="<?=$product['brand']?>">

                            <img src="/../../img/home/<?= $product['image'] ?>" alt="" style="display: block">

                            <label for="image">Изображение товара</label>
                            <input type="file" name="image" id="image" value="<?=$product['image']?>">

                            <label for="description">Детальное описание</label>
                            <textarea name="description" id="description" cols="30" rows="10"><?=$product['description']?></textarea>

                            <label for="is_new" style="margin-top: 15px">Новинка</label>
                            <select name="is_new" id="is_new">                                
                                <option value="1" <? if ($product['is_new'] == 1) echo ' selected'?>>Да</option>
                                <option value="0" <? if ($product['is_new'] == 0) echo ' selected'?>>Нет</option>
                            </select>

                            <label for="is_recomended" style="margin-top: 15px">Рекомендуемый</label>
                            <select name="is_recomended" id="is_recomended">                                
                                <option value="1" <? if ($product['is_recomended'] == 1) echo ' selected'?>>Да</option>
                                <option value="0" <? if ($product['is_recomended'] == 0) echo ' selected'?>>Нет</option>
                            </select>

                            <label for="status" style="margin-top: 15px">Статус</label>
                            <select name="status" id="status">                                
                                <option value="1" <? if ($product['status'] == 1) echo ' selected'?>>Отображается</option>
                                <option value="0" <? if ($product['status'] == 0) echo ' selected'?>>Скрыт</option>
                            </select>                           

                            <input type="submit" class="btn btn-default" value="Сохранить" name="submit" style="margin-top: 20px">
                        </form>
                        <div class="errors">
                            <? foreach ($errors as $error) : ?>
                                <p><?= $error ?></p>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>



                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->