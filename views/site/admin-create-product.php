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
                        <h2>Добавить новый товар</h2>
                        <form action="" method="post" enctype="multipart/form-data">

                            <label for="name">Название товара</label>
                            <input type="text" placeholder="Название товара" name="name" id="name">

                            <label for="category_id">Категория</label>
                            <select name="category_id" id="category_id">

                                <? foreach ($categories as $category) : ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <? endforeach; ?>

                            </select>

                            <label for="code" style="margin-top: 15px">Артикул</label>
                            <input type="text" placeholder="Артикул" name="code" id="code">

                            <label for="price">Стоимость</label>
                            <input type="text" placeholder="Стоимость" name="price" id="price">  
                            
                            <label for="availability">Наличие на складе</label>
                            <select name="availability" id="availability">                                
                                <option value="0" selected>Да</option>
                                <option value="1">Нет</option>
                            </select>

                            <label for="brand" style="margin-top: 15px">Производитель</label>
                            <input type="text" placeholder="Производитель" name="brand" id="brand">

                            <label for="image">Изображение товара</label>
                            <input type="file" name="image" id="image">

                            <label for="description">Детальное описание</label>
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>

                            <label for="is_new" style="margin-top: 15px">Новинка</label>
                            <select name="is_new" id="is_new">                                
                                <option value="1">Да</option>
                                <option value="0" selected>Нет</option>
                            </select>

                            <label for="is_recomended" style="margin-top: 15px">Рекомендуемый</label>
                            <select name="is_recomended" id="is_recomended">                                
                                <option value="1">Да</option>
                                <option value="0" selected>Нет</option>
                            </select>

                            <label for="status" style="margin-top: 15px">Статус</label>
                            <select name="status" id="status">                                
                                <option value="1" selected>Отображается</option>
                                <option value="0">Скрыт</option>
                            </select>                           

                            <input type="submit" class="btn btn-default" value="Добавить" name="submit" style="margin-top: 20px">
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