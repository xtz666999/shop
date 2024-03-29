<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <link href="/../../css/bootstrap.min.css" rel="stylesheet">
    <link href="/../../css/font-awesome.min.css" rel="stylesheet">
    <link href="/../../css/prettyPhoto.css" rel="stylesheet">
    <link href="/../../css/price-range.css" rel="stylesheet">
    <link href="/../../css/animate.css" rel="stylesheet">
    <link href="/../../css/main.css" rel="stylesheet">
    <link href="/../../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="../../js/html5shiv.js"></script>
        <script src="../../js/respond.min.js"></script>
        <![endif]-->
    <link rel="shortcut icon" href="../../img/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/../../img/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/../../img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/../../img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/../../img/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +7-123-123-12-12</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> queryselectorall@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="/"><img src="/../../img/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина <?= Cart::countItems(); ?><span class="ajax-output"></span></a></li>

                                <? if (UserModel::isGuest()) : ?>

                                    <li><a href="/login/"><i class="fa fa-lock"></i> Вход</a></li>

                                    <li><a href="/register/"><i class="fa fa-lock"></i> Регистрация</a></li>

                                <? else : ?>

                                    <li><a href="/cabinet/"><i class="fa fa-user"></i> Аккаунт</a></li>

                                    <li><a href="/logout/"><i class="fa fa-unlock"></i> Выход</a></li>

                                    <li><a href="/admin/"><i class="fa fa-user"></i> admin panel</a></li>

                                <? endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="/">Главная</a></li>
                                <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="/catalog/">Каталог товаров</a></li>
                                        <li><a href="/cart/">Корзина <?= Cart::countItems(); ?></a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Блог</a></li>
                                <li><a href="#">О магазине</a></li>
                                <li><a href="/contacts/">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->

    </header>
    <!--/header-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">


                        <?= $categoryMenu ?>


                    </div>
                </div>


                <?= $content; ?>

            </div>
        </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2015</p>
                    <p class="pull-right">Курс PHP Start</p>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->


    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.scrollUp.min.js"></script>
    <script src="../../js/price-range.js"></script>
    <script src="../../js/jquery.prettyPhoto.js"></script>
    <script src="../../js/main.js"></script>
    
</body>

</html>