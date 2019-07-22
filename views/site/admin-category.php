<a href="/admin/category/create" style="display: block; padding: 20px 0; font-size: 20px">Добавить категорию</a>

<table class="cart-table-php">
    <tr>
        <th>ID категории</th>
        <th>Название</th>
        <th>Порядок сортировки</th>
        <th>Статус</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    <? foreach ($categories as $category) : ?>

        <tr>

            <td>
                <?= $category['id'] ?>
            </td>

            <td>
                <?= $category['name'] ?>
            </td>

            <td>
                <?= $category['sort_order'] ?>
            </td>

            <td>
                <? if ($category['status'] == 1) : ?>
                    <?= 'Отображается' ?>
                <? else : ?>
                    <?= 'Скрыта' ?>
                <? endif; ?>
            </td>

            <td>
                <a href="/admin/category/update/<?= $category['id'] ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a>
            </td>

            <td>
                <a href="/admin/category/delete/<?= $category['id'] ?>" title="Удалить"><i class="fa fa-times"></i></a>
            </td>

        </tr>

    <? endforeach; ?>
</table>