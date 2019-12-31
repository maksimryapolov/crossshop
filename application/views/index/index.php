<?php require_once ROOT . "/application/views/layouts/header.php"?>

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
                                <? foreach ($result as $item): ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="catalog-product__box">
                                            <img class="catalog-product__img" src="./dist/images/cross1.jpg" alt="">
                                            <p class="catalog-product__name">
                                                <?= $item["name"]; ?>
                                            </p>
                                            <div class="catalog-product__box-bootom">
                                                <span class="catalog-product__price">
                                                     Цена: <?= $item["show_price"]; ?>
                                                </span>
                                                <div class="catalog-product__box-sizes">
                                                    Рзмер:
                                                    <? if(is_array($item["size"])): ?>
                                                        <? foreach ($item["size"] as $size): ?>
                                                            <span class="catalog-product__box-sizes-item">
                                                                <?= $size; ?>
                                                            </span>
                                                        <? endforeach; ?>
                                                    <? endif; ?>
                                                </div>
                                            </div>
                                            <a href="javascrip:void(0)" data-id="<?= $item["id_product"]; ?>" data-popup="#header_modal-product" class="catalog-product__btn button_servis popup">
                                                Заказать
                                            </a>
                                        </div>
                                    </div>
                                <? endforeach; ?>
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

<?php require_once ROOT . "/application/views/layouts/footer.php"?>