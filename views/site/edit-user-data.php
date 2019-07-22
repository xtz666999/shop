<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">                    

                    <? if ($res) : ?>
                        <p>Данные обновлены</p>
                        <a href="/">На главную</a>
                    <? else : ?>
                        <h2>Редактирование личных данных</h2>
                        <form action="" method="post">
                            <input type="text" placeholder="Имя" name="name" value="<?= $user['name'] ?>">
                            <input type="text" placeholder="Email" name="email" value="<?= $user['email'] ?>">
                            <input type="password" placeholder="Пароль" name="password">
                            <input type="submit" class="btn btn-default" value="Редактировать" name="submit">
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