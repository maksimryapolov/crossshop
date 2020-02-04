$(".maskphone").mask('+7(999) 999 99-99');

(function () {
    var close_btn = $(".b-popup__close");
    var popup_bg = $(".b-popup-bg");
    var id_modal = '';
    var time = 300;




    function close (e) {
        if(e.target == this) {
            $(id_modal).find('.b-popup').slideUp(time, function () {
                $(id_modal).removeClass('b-open-bg');
                checkClose(this);
            });
        } else if (e.keyCode == 27 && $(id_modal).hasClass("b-open-bg")) {
            $(id_modal).find('.b-popup').slideUp(time, function () {
                $(id_modal).removeClass('b-open-bg');
                checkClose(this);
            })
        }
    }

    function checkClose (e) {
        var txt = $(e).find("#success").text();
        if (txt.trim() != "") {
            $(e).find("#success").text("");
            if ($(e).find("#success").hasClass('success')) {
                $(e).find('input').val("");
            }
        }
        $('#carousel').removeClass('down-index');
    }

    (function() {
        var btnModal = $('.popup-form__btn');
        btnModal.on('click', function (e) {
            e.preventDefault();
            var container = this.closest('.b-popup-bg');
            if($(container).hasClass('b-open-bg')) {
                var errors = {};
                var result = {};
                var inputs = $(container).find('.popup-form__in');
                var messageBlock = $(container).find("#success");
                var message = "";
                var className = "";
                var data = {
                    phone: "телефон",
                    user: "имя",
                    product: "название товара",
                };

                inputs.each(function(index, item) {
                    var val = $(item).val().trim();
                    if(val == '' && !!$(item).attr('data-required')) {
                        errors[$(item).attr('name')] = "Поле " + data[$(item).attr('name')] + " не заполнено";
                    } else if(val != '') {
                        var patt = /^\+7[\d\(\)\ -]{4,14}\d$/;
                        if ($(item).attr('name') == "phone" && !patt.test(val)) {
                            errors[$(item).attr('name')] = "Неверный формат телефона";
                        }
                        result[$(item).attr('name')] = val;
                    }
                });

                result.ajax = "Y";

                if ($.isEmptyObject(errors)) {
                    messageBlock.removeClass('error');
                    messageBlock.text('');
                    $.ajax({
                        url: "/callback/",
                        method: "POST",
                        data: result,
                        success: function (res) {
                            var data = JSON.parse(res);
                            message = "Спасибо Ваш заказ принят";
                            className = "success";

                            if(!data.success) {
                                message = "При отправке формы произошла ошибка!";
                                className = "error";
                            }
                            messageBlock.addClass(className);
                            messageBlock.text(message);
                        }
                    });
                } else {
                    className = "error";
                    for(var key in errors) {
                        message += errors[key] + "<br>";
                    }
                    messageBlock.addClass(className);
                    messageBlock.html(message);
                }
            }
        });
    })();

    /*
    * Функция добавляет обработчики для товаров
    * */
    function hundlers() {
        $('.dropdown ul li').on('click', function() {
            var label = $(this).parent().parent().children('label');
            label.attr('data-value', $(this).attr('data-value'));
            label.html($(this).html());

            $(this).parent().children('.selected').removeClass('selected');
            $(this).addClass('selected');
        });

        $('.dropdown').on('click', function() {
            $(this).toggleClass('open');
        });

        $(".popup").on('click', function () {
            var itemProduct = this.closest('.catalog-product__box');

            id_modal = this.getAttribute('data-popup');
            $('.owl-item').addClass("fixed");
            $(id_modal).addClass('b-open-bg');

            if(itemProduct) {
                var idProduct = $(this).attr("data-id");
                var size = $(itemProduct.querySelector('label')).attr("data-value");
                var name = $(itemProduct.querySelector('.catalog-product__name')).text();
                var inputName = $('#nameProduct');
                var inputSize = $('#sizeProduct');
                var inputId = $('#idProduct');
                inputName.val(name);
                inputSize.val(size);
                inputId.val($(this).attr('data-id'));
                inputName.attr('disabled', true);
            }
            $('#carousel').addClass('down-index');
            $(id_modal).find('.b-popup').slideDown(time);
        });
    }

    close_btn.on('click', close);
    popup_bg.on('click', close);
    $(document.body).on('keyup', close);

    (function () {
        var btn = $('#sendAjax');
        btn.on('click', function (e) {
            var spinner = $('#spinner');
            var block = $('.block_more');
            $(this).css({'display':'none'});
            block.append(spinner);
            spinner.css({'display':'inline-block'});
            e.preventDefault();
            var tmpl = $('#product-content'),
                _this = this;
            $.ajax({
                url: '/',
                method: 'POST',
                data: {VALUE: $(this).attr('data-more'), AJAX: "Y"},
                success: function (res) {

                    var data = JSON.parse(res),
                        str = '',
                        items = data.items,
                        page = data.page;

                    if (data && Array.isArray(items)) {
                        items.forEach(function(item, i) {

                            str += '<div class="col-10 col-lg-4 col-md-6 added_item">' +
                                '<div class="catalog-product__box">' +
                                '<div class="catalog-product__img" style="background-image: url('+ item.image +');"></div>' +
                                '<p class="catalog-product__name" data-content="title">'+ item.name +'</p>' +
                                '<div class="catalog-product__box-bootom">' +
                                '<span class="catalog-product__price">Цена:&nbsp;'+item.show_price+'</span>' +
                                '<div class="catalog-product__box-sizes">' +
                                '<div class="wrapper">' +
                                ' <div class="dropdown">' +
                                '<label data-value="">Выберите размер</label>' +
                                '<ul>';

                            item.size.forEach(function (elem) {
                                str += '<li>' + elem + '</li>';
                            });

                            str += '</ul></div></div></div></div>' +
                                '<span class="catalog-product__box-avl">В наличии: '+ item.avl +'</span>' +
                                '<a href="javascrip:void(0)" data-id="'+ item.id_product +'" data-popup="#header_modal-product" class="catalog-product__btn button_servis popup">Заказать</a></div></div>';
                        });



                        $(_this).attr('data-more', page);
                        tmpl.append(str);
                        $('.added_item').slideDown(400, function () {
                            $(this).removeClass('added_item');
                        });
                        spinner.css({'display':'none'});
                        $(_this).css({'display':'inline-block'});
                        if (!page) {
                            $(_this).fadeOut(function () {
                                $(this).remove();
                            });
                        }
                        hundlers();
                    }
                }
            });
        });
    })();

    hundlers();

})();

(function(){
    $("a[href^='#']").click(function(){
            var _href = $(this).attr("href");
            $("html, body").animate({scrollTop: $(_href).offset().top+"px"});
            return false;
    });
})();

(function () {
    var size = $('.catalog-product__box-sizes-item');
    var active_class = 'active-size';
    size.on('click', function (e) {

        var flag = true;
        if ($(this).hasClass(active_class)) {
            $(this).removeClass(active_class);
            flag = false;
        }

        size.removeClass(active_class);

        if(flag) {
            $(this).addClass(active_class);
        }
    })
})();

(function() {

    var owlObj = {
        formalization: {

        },
        carousel: {

        }
    }

    $(document).ready(function(){
        $("#carousel").owlCarousel({
            items:3,
            loop: true,
            autoplay: true,
            center: true,
            responsive : {
                0: {
                    items: 2,
                    center: false,
                    margin: 5
                },
                1200: {
                    items: 3,
                }
            }
        });

        $("#formalization").owlCarousel({
            
            responsive : {
                0: {
                    items: 2,
                    center: false,
                    margin: 5
                },
                768: {
                    items: 3,
                }
            }
        });
      });
})();
