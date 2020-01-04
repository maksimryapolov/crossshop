<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./dist/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Магазин кроссовок</title>
</head>
<body>
    <header class="header">
        <div class="header-nav__top">
            <div class="container ">
                <div class="row">
                    <div class="col">
                        <div class="col-xl-5 offset-xl-7 header-top__link">
                            <a href="mailto:adminemail@mail.com">
                                maks.riapolov@yandex.ru
                            </a>
                            <a href="tel:+89507174848">
                                +7(950) 717-48-48
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="nav">
            <div class="container">
                <div class="row nav-box">
                      <ul class="nav-box__items col-12">
                        <!-- <li class="nav-item">
                            <a class="nav-item__link" href="#header" class="">Главная</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-item__link" href="#advantages" class="">Преимущества</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item__link" href="#catalog" class="">Каталог</a>
                        </li>
                        <!--<li class="nav-item">-->
                            <!--<a class="nav-item__link" href="#catalog" class="">Отзывы</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-item__link" href="#footer" class="">Контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header-banner">
            <div class="container">
                <h1 class="header-banner__title">Распродажа кроссовок</h1>
                <p class="header-banner__description">
                    <span>
                        Небольшая качественная коллекции обуви распродаются со&nbsp;скидкой до&nbsp;70%.<br> Успейте порадовать себя и&nbsp;своих близких.
                    </span>
                </p>
                <a href="javascript:void(0)" class="header-banner__btn popup button_servis" data-popup="#header_modal">Заказать звонок</a>
            </div>
        </div>
    </header>

    <main>
        <section class="advantages" id="advantages">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="advantages__item-box">
                            <div class="advantages__item-circle glasses"></div>
                            <div class="advantages__title"><b>Осмотр перед покупкой</b></div>
                            <p class="advantages__text">Вы сможете примерить обувь перед оплатой заказа курьеру. Оплачивайте только то, что вам подошло и понравилось!</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="advantages__item-box">
                            <div class="advantages__item-circle logistics"></div>
                            <div class="advantages__title">
                                <b>Доставка в любое время</b>
                            </div>
                            <p class="advantages__text">
                               Вы получите свой заказ уже в этот же день! Самое главное, доставка бесплатна.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="advantages-main">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="./dist/images/advantages.jpg" class="advantages-main__img" alt="">
                    </div>
                    <div class="col-sm-6">
                        <div class="advantages-main__box">
                            <h2 class="advantages-main__title">Почему стоит купить у нас</h2>
                            <div class="advantages-main__description">
                                Наша обувь представлена в большом разнообразии моделей, размеров и расцветок. Она подходит для
                                разного времени года и сочетается как с классическим, так и со спортивным или повседневным гардеробом.
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon moneybox"></div>
                                <span>Самая выгодная цена!</span>
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon return"></div>
                                <span>Гарантия возврата денег в течении 10 дней!</span>
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon delivery"></div>
                                <span>Бесплатная доставка в черте города!</span>
                            </div>
                            <!-- <div class="advantages-main__item">
                                <div class="advantages-main__item-icon"></div>
                                <span>Бесплатная консультация!</span>
                            </div> -->
                            <a href="javascript:void(0)" data-popup="#header_modal" class="advantages-main__btn popup button_servis">
                                Получить консультацию
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="catalog" id='catalog'>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="catalog__box">
                            <h2 class="catalog__title">Наши кроссовки по смешным ценам</h2>
                            <div class="catalog__description">
                                Ниже представлены модели из нашего ассортимента. Свяжитесь с нами, чтобы получить более бодробную информацию.
                            </div>
                            <div class="catalog-product__container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="catalog-product__box">
                                            <img class="catalog-product__img" src="./dist/images/cross1.jpg" alt="">
                                            <p class="catalog-product__name">
                                                Кроссовки черные спортивные
                                            </p>
                                            <div class="catalog-product__box-bootom">
                                                <span class="catalog-product__price">
                                                    900 руб.
                                                </span>
                                                <div class="catalog-product__box-sizes">
                                                    <span class="catalog-product__box-sizes-item">
                                                        40
                                                    </span>
                                                    <span class="catalog-product__box-sizes-item">
                                                        41
                                                    </span>
                                                    <span class="catalog-product__box-sizes-item">
                                                        42
                                                    </span>
                                                    <span class="catalog-product__box-sizes-item">
                                                        43
                                                    </span>
                                                    <span class="catalog-product__box-sizes-item">
                                                        44
                                                    </span>
                                                    <span class="catalog-product__box-sizes-item">
                                                        45
                                                    </span>
                                                </div>
                                            </div>
                                            <a href="javascrip:void(0)" data-popup="#header_modal-product" class="catalog-product__btn button_servis popup">
                                                Заказать
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section>

        <section class="b-popular">
            <div class="container">
                <h1 class="b-popular__title">Популярные товары</h1>

                <div class="slider">
                    <div class="slider__wrapper">
                        <div class="slider__item">
                            <!--<div style="height: 250px; background: orange;">1</div>-->
                            <img class="slider__item-img" src="./dist/images/cross1.jpg" alt="">
                        </div>
                        <div class="slider__item">
                            <!--<div style="height: 250px; background: url('./dist/images/cross1.jpg');"></div>-->
                            <img class="slider__item-img" src="./dist/images/cross2.jpg" alt="">
                        </div>
                        <div class="slider__item">
                            <!--<div style="height: 250px; background: violet;">3</div>-->
                            <img class="slider__item-img" src="./dist/images/cross3.jpg" alt="">
                        </div>
                        <div class="slider__item">
                            <!--<div style="height: 250px; background: coral;">4</div>-->
                            <img class="slider__item-img" src="./dist/images/cross4.jpg" alt="">
                        </div>
                    </div>
                    <a class="slider__control slider__control_left" href="#" role="button"></a>
                    <a class="slider__control slider__control_right slider__control_show" href="#" role="button"></a>
                </div>
            </div>
        </section>
    </main>

    <footer class="b-footer" id="footer">
        <div class="container">
            <div class="b-footer__title">
                Распродажа известных брендов спортивной обуви
            </div>
            <div class="b-footer__contact">
                <a href="javascript:void(0)" class="b-footer__btn popup button_servis" data-popup="#header_modal">Заказать звонок</a>
                <div class="b-footer__info">
                    <div>
                        <span class="b-footer__info-item">Email:</span>
                        <a href="mailto:maks.riapolov@yandex.ru">maks.riapolov@yandex.ru</a>
                    </div>
                    <div>
                        <span class="b-footer__info-item">Телефон:</span>
                        <a href="tel:89040870275">
                            89040870275
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="header_modal" class="b-popup-bg">
        <div class="b-popup">
            <button class="b-popup__close">&times;</button>
            <div class="b-popup__container">
                <h4 class="b-popup__title">
                    Заказать обратный звонок
                </h4>
                <div class="b-popup__description">
                    Оставьте номер телефона и&nbsp;наши менеджеры свяжутся с&nbsp;Вами в&nbsp;ближайшее время
                </div>
                <form action="" class="popup-form">
                    <input class="popup-form__in maskphone" type="text" name="phone" placeholder="Введите номер телефона...">
                    <button class="popup-form__btn">Перезвоните мне</button>
                </form>
            </div>
        </div>
    </div>

    <div id="header_modal-product" class="b-popup-bg">
            <div class="b-popup">
                <button class="b-popup__close">&times;</button>
                <div class="b-popup__container">
                    <h4 class="b-popup__title">
                        Заказать обратный звонок
                    </h4>
                    <div class="b-popup__description">
                        Оставьте номер телефона и&nbsp;наши менеджеры свяжутся с&nbsp;Вами в&nbsp;ближайшее время
                    </div>
                    <form action="" class="popup-form">
                        <input class="popup-form__in" type="text" name="name" placeholder="Введите имя...">
                        <input class="popup-form__in maskphone" type="text" name="phone" placeholder="Введите номер телефона...">
                        <input class="popup-form__in" type="text" name="product" placeholder="Название товара...">                   
                        <button class="popup-form__btn">Перезвоните мне</button>
                    </form>
                </div>
            </div>
        </div>

    <script src="./dist/js/main.js"></script>
</body>
</html>