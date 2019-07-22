<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">


                    <h2>Добавление категории</h2>
                    <form action="" method="post" enctype="multipart/form-data">

                        <label for="name">Название категории</label>
                        <input type="text" name="name" id="name">                        

                        <label for="name">Порядок сортировки</label>
                        <input type="text" name="sort_order" id="name">

                        <label for="status" style="margin-top: 15px">Статус</label>
                        <select name="status" id="status">
                            <option value="1">Отображается</option>
                            <option value="0">Скрыт</option>
                        </select>

                        <input type="submit" class="btn btn-default" value="Добавить" name="submit" style="margin-top: 20px">
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->