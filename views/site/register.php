<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <!-- <h2>Вход</h2>
                    <form action="#">
                        <input type="text" placeholder="Name" />
                        <input type="email" placeholder="Email Address" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            запомнить меня
                        </span>
                        <button type="submit" class="btn btn-default">Войти</button>
                    </form>
                </div>
                <!--/login form-->
                    <!-- </div>
            <div class="col-sm-1">
                <h2 class="or">Или</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"> -->
                    <!--sign up form-->

                    <? if ($res) : ?>
                        <p>Успешная регистрация</p>
                        <a href="/">На главную</a>
                    <? else : ?>
                        <h2>Регистрация на сайте!</h2>
                        <form action="" method="post">
                            <input type="text" placeholder="Имя" name="name" value="<?= $name ?>">
                            <input type="text" placeholder="Email" name="email" value="<?= $email ?>">
                            <input type="password" placeholder="Пароль" name="password">
                            <input type="submit" class="btn btn-default" value="Зарегистрироваться" name="submit">
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