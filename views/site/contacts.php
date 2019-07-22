<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">                    

                    <? if ($res) : ?>
                        <p>Ваше сообщение отправлено</p>
                        <a href="/">На главную</a>
                    <? else : ?>
                        <h2>Напишите нам</h2>
                        <form action="" method="post">
                            <input type="text" placeholder="Имя" name="name"">
                            <input type="text" placeholder="Email" name="email">
                            <textarea rows="6" name="message">Сообщение</textarea>
                            <input type="submit" class="btn btn-default" value="Отправить" name="submit">
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