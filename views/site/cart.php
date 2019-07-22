<table class="cart-table-php">
    <tr>
    <th>Код товара</th>
    <th>Название</th>
    <th>Стоимость</th>
    <th>Количество</th>
    <th>Удалить</th>
    </tr>
    <? foreach ($productsFull as $oneProduct) : ?>

        <tr>

            <td>
                <?= $oneProduct['code']?>
            </td>

            <td>
                <?= $oneProduct['name']?>
            </td>

            <td>
                <?= $oneProduct['price']?>
            </td>

            <td>
                <?= $oneProduct['quantity']?>
            </td>

            <td>
                <a href="/cart/delete/<?=$oneProduct['id']?>">Удалить</a>
            </td>

        </tr>

    <? endforeach; ?>
</table>

<div class="cart-sum">Общая стоимость: <span><?=$sum?> руб.</span></div>
<a href="/cart/checkout/" class="cart-sum">Оформить заказ</a>