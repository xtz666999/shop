<div class="col-sm-9 padding-right">
    <div class="product-details">
        <!--product-details-->
        <div class="row">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="../../img/home/<?= $product['image'] ?>" alt="" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="../../img/product-details/new.jpg" class="newarrival" alt="" />
                    <h2><?= $product['name'] ?></h2>
                    <p>Код товара: <?= $product['code'] ?></p>
                    <span>
                        <span><?= $product['price'] ?></span>
                        <label>Количество:</label>
                        <input type="text" value="3" />
                        <button type="button" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            В корзину
                        </button>
                    </span>
                    <p><b>Наличие:</b> На складе</p>
                    <p><b>Состояние:</b> Новое</p>
                    <p><b>Производитель:</b> D&amp;G</p>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5>Описание товара</h5>
                <p><?=$product['description']?></p>
            </div>
        </div>
    </div>
    <!--/product-details-->

</div>