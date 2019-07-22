<a href="/admin/product/create" style="display: block; padding: 20px 0; font-size: 20px">Добавить товар</a>

<table class="cart-table-php">
    <tr>
        <th>ID товара</th>
        <th>Код товара</th>
        <th>Название товара</th>
        <th>Цена</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <? foreach ($products as $oneProduct) : ?>

        <tr>

            <td>
                <?= $oneProduct['id'] ?>
            </td>

            <td>
                <?= $oneProduct['code'] ?>
            </td>

            <td>
                <?= $oneProduct['name'] ?>
            </td>

            <td>
                <?= $oneProduct['price'] ?>
            </td>

            <td>
                <a href="/admin/product/update/<?=$oneProduct['id']?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
            </td>

            <td>
                <a href="/admin/product/delete/<?=$oneProduct['id']?>" title="Удалить"><i class="fa fa-times"></i></a>
            </td>

        </tr>

    <? endforeach; ?>
</table>