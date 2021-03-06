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
                <div class="col-lg-6 advantages-main__image-block">
                    <img src="./dist/images/advantages.jpg" class="advantages-main__img" alt="">
                </div>
                <div class="col-lg-6" >
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
                        <a href="javascript:void(0)" data-popup="#header_modal-question" class="advantages-main__btn popup button_servis">
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
                            <div class="row catalog__block" id="product-content">
                                <? foreach ($result as $item): ?>
                                    <div class="col-10 col-lg-4 col-md-6">
                                        <div class="catalog-product__box">
                                            <div class="catalog-product__img" style="background-image: url('<?= $item['image']; ?>');"></div>
                                            <p class="catalog-product__name">
                                                <?= $item["name"]; ?>
                                            </p>
                                            <div class="catalog-product__box-bootom">
                                                <span class="catalog-product__price">
                                                     Цена: <?= $item["show_price"]; ?>
                                                </span>
                                                <div class="catalog-product__box-sizes">
                                                    <div class="wrapper">
                                                        <div class="dropdown">
                                                            <label data-value="">Выберите размер</label>
                                                            <ul>
                                                                <? if(is_array($item["size"])): ?>
                                                                    <? foreach ($item["size"] as $size): ?>
                                                                        <li data-value="<?= $size; ?>">
                                                                            <?= $size; ?>
                                                                        </li>
                                                                    <? endforeach; ?>
                                                                <? endif; ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <span class="catalog-product__box-avl">В наличии: <?= $item["avl"]; ?></span>
                                            <a href="javascrip:void(0)" data-id="<?= $item["id_product"]; ?>" data-popup="#header_modal-product" class="catalog-product__btn button_servis popup">
                                                Заказать
                                            </a>
                                        </div>
                                    </div>
                                <? endforeach; ?>

                            </div>
                            <div class="block_more">
                                <button class="button_servis" data-more="<?= $page; ?>" id="sendAjax">
                                    Показать еще
                                </button>
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
            <div class="owl-carousel owl-theme" id="carousel">
                <? foreach($slides as $slide): ?>
                    <div class="slider__item" style="background-image:url('<?= $slide; ?>')"></div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
</main>

<div class='formalization'>
    <div class="container">
        <div class="row owl-carousel owl-theme formalization__tablet" >
            <div class="col-md-4 formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                    <b>Шаг 1</b> 
                    </div>
                    <img src="./dist/images/svg/arrow.svg" class="formalization__arrow" alt="arrow">
                </div>
                <div class="formalization__bottom">
                    <h3>Выберите товар</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
            <div class="col-md-4 formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                    <b>Шаг 2</b> 
                    </div>
                    <img src="./dist/images/svg/arrow.svg" class="formalization__arrow" alt="arrow">
                </div>
                <div class="formalization__bottom">
                    <h3>Заполните форму</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
            <div class="col-md-4 formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                        <b> Шаг 3</b>
                        </div>
                </div>
                <div class="formalization__bottom">
                    <h3>Ожидайте звонка</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
        </div>
        <div class="row owl-carousel owl-theme" id='formalization'>
            <div class="formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                    <b>Шаг&nbsp;1</b> 
                    </div>
                    <img src="./dist/images/svg/arrow.svg" class="formalization__arrow" alt="arrow">
                </div>
                <div class="formalization__bottom">
                    <h3>Выберите пару</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
            <div class="formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                    <b>Шаг&nbsp;2</b> 
                    </div>
                    <img src="./dist/images/svg/arrow.svg" class="formalization__arrow" alt="arrow">
                </div>
                <div class="formalization__bottom">
                    <h3>Заполните форму</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
            <div class="formalization__block">
                <div class="formalization__item">
                    <div class="formalization__title">
                        <b> Шаг&nbsp;3</b>
                        </div>
                </div>
                <div class="formalization__bottom">
                    <h3>Ожидайте звонка</h3>
                    <p class="formalization__desc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi necessitatibus a modi deserunt perspiciatis architecto placeat quidem consequuntur.
                    </p>
                </div>
            </div>
        </div>
        <hr class="frontier">
        <div class="formalization__offer">
            А&nbsp;так&nbsp;же, мы&nbsp;не&nbsp;можем отказать оформить заказ такому красавчику через <a href="https://vk.com/cross_shop31" class="formalization__offer-link" target="_blank">социальную сеть</a>
        </div>
    </div>
</div>

<?php require_once ROOT . "/application/views/layouts/footer.php"?>