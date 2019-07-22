<h2>Каталог</h2>
<div class="panel-group category-products">

    <? foreach ($categories as $one) : ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="/category/<?= $one['id'] ?>"><?= $one['name'] ?></a></h4>
            </div>
        </div>
    <? endforeach; ?>
</div>