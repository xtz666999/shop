<h2 class="title text-center">Каталог</h2>
<div class="col-sm-9 padding-right">

    <? foreach ($productsByCategory as $product) : ?>

        <!--features_items-->
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="../../img/home/<?= $product['image'] ?>" alt="" />
                        <h2><?= $product['price'] ?></h2>
                        <p>
                            <a href="/product/<?= $product['id'] ?>"><?= $product['name'] ?></a>
                        </p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                    </div>

                    <? if ($product['is_new']) : ?>
                        <img src="../../img/home/new.png" class="new" alt="">
                    <? endif; ?>

                </div>
            </div>
        </div>
        <!--features_items-->
    <? endforeach; ?>
</div>