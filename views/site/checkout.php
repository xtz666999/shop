<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">

                    <? if ($res) : ?>

                        <p>Заказ оформлен. Мы перезвоним вам в ближайшее время</p>

                    <? else : ?>

                        <h2>Оформление заказа</h2>
                        <p>Выбрано товаров: <?= $quantity ?></p>
                        <p>На общую сумму: <?= $sum ?></p>

                        <form action="" method="post">
                            <input type="text" placeholder="Имя" name="name" value="<?= $userName ?>">
                            <input type=" text" placeholder="Телефон" name="phone">
                            <textarea rows="6" name="message">Комментарий к заказу</textarea>
                            <input type="submit" class="btn btn-default" value="Оформить" name="submit">
                        </form>
                    <? endif; ?>

                    <div class="errors">
                        <? foreach ($errors as $error) : ?>
                            <p><?= $error ?></p>
                        <? endforeach; ?>
                    </div>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->