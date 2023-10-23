$(function () {

    //add simple support for background images:
    document.addEventListener('lazybeforeunveil', function (e) {
        var bg = e.target.getAttribute('data-bg');
        if (bg) {
            e.target.style.backgroundImage = 'url(' + bg + ')';
        }
    });
    $('.production__tabs-head--most-used .production__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.i-most-used__tab').removeClass('active').eq($(this).index()).addClass('active');
        }
    });
    $('.production__tabs-head--cats .production__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.production-tab').removeClass('active').eq($(this).index()).addClass('active');
        }
    });
    $('.production__tabs-head--eq-cats .production__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.equipment__tab').removeClass('active').eq($(this).index()).addClass('active');
        }
        if ($(this).index() == 0) {
            $('.equipment__subtitle').show();
        } else {
            $('.equipment__subtitle').hide();
        }
    });

    $('.production-tab__cat-btn').click(function (e) {
        e.preventDefault();
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            var bg = $(this).attr('data-bg');
            $(this).closest('.production-tab').css('background-image', 'url(' + bg + ')');
        }
    });


    if ($('.portfolio__slider').length > 0) {
        var portfolioSlider = new Swiper('.portfolio__slider', {
            slidesPerView: 1,
            spaceBetween: 25,
            navigation: {
                prevEl: '.portfolio-slider-arrow-left',
                nextEl: '.portfolio-slider-arrow-right',
            },
        });
        if ($('.portfolio__slider .case').length == 1) {
            $('.portfolio__slider-wrapper, .portfolio__mob-slider-btns').addClass('no-arrows');
        }
    }
    if ($('.case__slider').length > 0) {
        $('.case__slider').each(function () {
            var caseSlider = new Swiper($(this)[0], {
                slidesPerView: 1,
                spaceBetween: 8,
                breakpoints: {
                    560: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    980: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                },
            });

        });
    }
    if ($('.news__slider').length > 0) {
        var newsSlider = new Swiper('.news__slider', {
            slidesPerView: 'auto',

            spaceBetween: 25,
            navigation: {
                prevEl: '.news__slider-wrapper .swiper-button-prev',
                nextEl: '.news__slider-wrapper .swiper-button-next',
            },
            breakpoints: {
                780: {
                    slidesPerView: 3,
                    spaceBetween: 37,
                },
                1050: {
                    slidesPerView: 4,
                    spaceBetween: 37,
                },
            },

        });
    }
    $('.portfolio__mob-slider-btns .slider-arrow--left').click(function () {
        $('.portfolio__slider-wrapper .slider-arrow--left').click();
    });
    $('.portfolio__mob-slider-btns .slider-arrow--right').click(function () {
        $('.portfolio__slider-wrapper .slider-arrow--right').click();
    });

    if ($('.last-cases__slider').length > 0) {
        var lastCases = new Swiper('.last-cases__slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            breakpoints: {
                660: {
                    slidesPerView: 2,
                },
            },
            navigation: {
                prevEl: '.last-cases__slider-wrapper .swiper-button-prev',
                nextEl: '.last-cases__slider-wrapper .swiper-button-next',
            },
        });
    }


    // if ($('.seo-text__wysiwig').length > 0) {
    //     $('.seo-text__wysiwig  > *').slice(2).hide();
    //
    //     $('.seo-text__more-link a').click(function (e) {
    //
    //         e.preventDefault();
    //         if ($(this).hasClass('opened')) {
    //             $(this).removeClass('opened');
    //             $(this).text('Читать полностью');
    //             $('.seo-text__wysiwig  > *').slice(2).hide();
    //         } else {
    //             $(this).addClass('opened');
    //             $(this).text('Скрыть текст');
    //             $('.seo-text__wysiwig > *:not(:first-child)').show();
    //         }
    //     });
    // }

    $('.select-2').select2({
        minimumResultsForSearch: -1,
        containerCssClass: 'test123123',
    });

    if ($('.service-hero__slider').length > 0) {
        let serviceHeroSliderInited = false;
        $(window).scroll(function () {
            if(!serviceHeroSliderInited && $(window).scrollTop() > 50) {
                serviceHeroSliderInited = true;
                var serviceHeroSlider = new Swiper('.service-hero__slider', {
                    slidesPerView: 1,
                    spaceBetween: 20,

                    navigation: {
                        prevEl: '.service-hero__slider-wrapper .swiper-button-prev',
                        nextEl: '.service-hero__slider-wrapper .swiper-button-next',
                    },
                });
            }
        })

    }
    if ($('.i-equipment__slider').length > 0) {

        let equipmentSliderInited = false;

        $(window).scroll(function () {
            if(!equipmentSliderInited && $(window).scrollTop() > 200) {
                equipmentSliderInited = true;
                var equipmentSlider = new Swiper('.i-equipment__slider', {
                    slidesPerView: 1,
                    spaceBetween: 20,

                    navigation: {
                        prevEl: '.i-equipment__slider-wrapper .slider-arrow--left',
                        nextEl: '.i-equipment__slider-wrapper .slider-arrow--right',
                    },
                });
            }
        })


    }
    if ($('.slogan__clients-slider').length > 0) {
        let sloganSliderInited = false;
        $(window).scroll(function () {
            if (!sloganSliderInited && $(window).scrollTop() > 200) {
                var clientsSlider = new Swiper('.slogan__clients-slider', {
                    slidesPerView: 2,
                    spaceBetween: 7,
                    navigation: {
                        prevEl: '.slogan__clients-controls .swiper-button-prev',
                        nextEl: '.slogan__clients-controls .swiper-button-next',
                    },
                    breakpoints: {
                        560: {
                            slidesPerView: 4,

                        },
                        780: {
                            spaceBetween: 25,
                            slidesPerView: 'auto',
                        },
                        960: {

                            slidesPerView: 'auto',
                            spaceBetween: 37,
                        },
                    },
                });
            }
        });
    }
    if ($('.gratitude__slider').length > 0) {
        let gratitudeSliderInited = false;
        $(window).scroll(function () {
            if (!gratitudeSliderInited && $(window).scrollTop() > 200) {
                gratitudeSliderInited = true;
                var gratitudeSlider = new Swiper('.gratitude__slider', {
                    slidesPerView: 1.5,
                    spaceBetween: 20,

                    navigation: {
                        prevEl: '.gratitude__slider-wrapper .slider-arrow--left',
                        nextEl: '.gratitude__slider-wrapper .slider-arrow--right',
                    },
                    breakpoints: {
                        450: {
                            slidesPerView: 1.9,

                        },
                        560: {
                            slidesPerView: 2.2,

                        },
                        780: {
                            slidesPerView: 3.5,

                        },
                        960: {
                            slidesPerView: 4,
                            spaceBetween: 44,

                        },
                        1200: {
                            slidesPerView: 4,
                        },
                    },
                });
            }
        });
    }
    if ($('.ideas__slider').length > 0) {
        let ideasSliderInited = false;
        $(window).scroll(function () {
            if (!ideasSliderInited && $(window).scrollTop() > 200) {
                var ideasSlider = new Swiper('.ideas__slider', {
                    slidesPerView: 1.1,
                    spaceBetween: 13,
                    navigation: {
                        prevEl: '.ideas__slider-wrapper .slider-arrow--left',
                        nextEl: '.ideas__slider-wrapper .slider-arrow--right',
                    },
                    breakpoints: {
                        450: {
                            slidesPerView: 1.6,
                            spaceBetween: 16,
                        },
                        560: {
                            slidesPerView: 1.9,
                            spaceBetween: 20,
                        },
                        780: {
                            slidesPerView: 2.2,
                        },
                        960: {
                            slidesPerView: 2.5,
                            spaceBetween: 30,
                        },
                        1060: {
                            slidesPerView: 3,
                        },
                    },
                });
            }
        });
    }


    if ($('.come__tab-btn').length > 0) {
        $('.come__tab-btn').click(function () {
            if (!$(this).hasClass('active')) {
                var index = $(this).index() + 1;
                $('.come__tab-btn.active').removeClass('active');
                $('.come__tab-btn:nth-child(' + index + ')').addClass('active');

                $('.come__tab.active').removeClass('active');
                $('.come__tab').eq($(this).index()).addClass('active');
            }
        });

        // $('.come__tab-btn').eq(0).trigger('click');

        window.initYandexMap = function () {
            if (ymaps !== undefined) {
                ymaps.ready(function () {
                    if ($('#map-1').length > 0) {

                        var center = $('#map-1').attr('data-center').split(',');
                        var marker = $('#map-1').attr('data-marker').split(',');
                        var zoom = $('#map-1').attr('data-zoom');
                        var title = $('#map-1').attr('data-title');
                        var myMap = new ymaps.Map('map-1', {
                                center: center,
                                zoom: zoom,
                                controls: [],
                            }, {
                                searchControlProvider: 'yandex#search',
                            }),

                            myPlacemark = new ymaps.Placemark(marker, {
                                hintContent: title,
                            }, {
                                // Опции.
                                // Необходимо указать данный тип макета.
                                iconLayout: 'default#image',
                                // Своё изображение иконки метки.
                                iconImageHref: theme_dir + '/img/map-icon.png',
                                // Размеры метки.
                                iconImageSize: [86, 86],
                                // Смещение левого верхнего угла иконки относительно
                                // её "ножки" (точки привязки).
                                iconImageOffset: [-43, -43],
                            });


                        myMap.geoObjects
                            .add(myPlacemark);
                    }
                    if ($('#map-2').length > 0) {
                        var center = $('#map-2').attr('data-center').split(',');
                        var marker = $('#map-2').attr('data-marker').split(',');
                        var zoom = $('#map-2').attr('data-zoom');
                        var title = $('#map-2').attr('data-title');
                        var myMap = new ymaps.Map('map-2', {
                                center: center,
                                zoom: zoom,
                                controls: [],
                            }, {
                                searchControlProvider: 'yandex#search',
                            }),

                            myPlacemark = new ymaps.Placemark(marker, {
                                hintContent: title,
                            }, {
                                // Опции.
                                // Необходимо указать данный тип макета.
                                iconLayout: 'default#image',
                                // Своё изображение иконки метки.
                                iconImageHref: theme_dir + '/img/map-icon.png',
                                // Размеры метки.
                                iconImageSize: [86, 86],
                                // Смещение левого верхнего угла иконки относительно
                                // её "ножки" (точки привязки).
                                iconImageOffset: [-43, -43],
                            });


                        myMap.geoObjects
                            .add(myPlacemark);
                    }
                });
            }
        };

        let mapInited = false;
        $(window).scroll(function () {
            if (mapInited == false && $(window).scrollTop() > 100) {
                mapInited = true;
                let src = 'https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp&onload=initYandexMap';
                const script = document.createElement('script');
                script.type = 'text/javascript';
                script.async = true;

                script.src = src;
                document.head.appendChild(script);
            }
        });


    }

    if ($('.service-calc__input-group--count').length > 0) {
        let ionRangeInited = false;
        $(window).scroll(function () {
            if(!ionRangeInited && $(window).scrollTop > 100) {
                ionRangeInited = true;
                $('.service-calc__input-group--count').each(function () {
                    var min = $(this).find('.range').attr('data-min');
                    var max = $(this).find('.range').attr('data-max');
                    var output = $('.range-output');
                    $(this).find('.range').ionRangeSlider({
                        min: min,
                        max: max,

                        onChange: function (data) {
                            output.val(data.from.toLocaleString());
                        },
                    });
                });
            }
        })

    }

    if ($('.i-portfolio__tabs-head-mob').length > 0) {
        $('.i-portfolio__tabs-head-mob .i-portfolio__tab-head').click(function () {
            var val = $(this).text();
            $('.i-portfolio__tabs-head-mob').removeClass('opened');
            $('.i-portfolio__tabs-head-mob .current span').text(val);

            $(this).addClass('active').siblings('.active').removeClass('active');

            $('.i-portfolio__tab').removeClass('active').eq($(this).index()).addClass('active');
        });

        $('.i-portfolio__tabs-head-mob .current').click(function () {
            $(this).parent().toggleClass('opened');
        });
    }
    if ($('.custom-select').length > 0) {
        $('.custom-select .item').click(function () {
            var val = $(this).text();
            $(this).closest('.custom-select').removeClass('opened');
            $(this).closest('.custom-select').find('.current').text(val);

            $(this).addClass('active').siblings('.active').removeClass('active');
        });

        $('.custom-select .current').click(function () {
            $(this).parent().toggleClass('opened');
        });

        $('.service-calc__options-mob-select .item').click(function () {
            $('.service-calc__option').removeClass('active');
            $('.service-calc__option').eq($(this).index()).addClass('active').find('input').prop('checked', true);
        });
        $('.requirements__tabs-select .item').click(function () {
            $('.requirements__tab-content').removeClass('active');
            $('.requirements__tab-content').eq($(this).index()).addClass('active');
        });

        $('.projects__tabs-select .item').click(function () {
            $('.projects__tab').removeClass('active');
            $('.projects__tab').eq($(this).index()).addClass('active');
        });
        $('.p-portfolio__cats-select .item').click(function () {
            $('.p-portfolio__cats-tab').removeClass('active');
            $('.p-portfolio__cats-tab').eq($(this).index()).addClass('active');
        });
    }

    $('.i-portfolio__slider-wrapper').each(function () {
        var slider = $(this).find('.i-portfolio__slider');
        var btnPrev = $(this).find('.slider-arrow--left');
        var btnNext = $(this).find('.slider-arrow--right');

        var portfolioSlider = new Swiper(slider[0], {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                prevEl: btnPrev[0],
                nextEl: btnNext[0],
            },
            breakpoints: {
                660: {
                    slidesPerView: 2,
                },
                780: {

                    noSwiping: true,
                    noSwipingClass: 'swiper-slide',
                },
            },
        });
    });

    $('.terms__variants .item').click(function () {
        $('.terms__delivery-block').removeClass('active').eq($(this).index()).addClass('active');
    });

    $('.service-calc__format').eq(0).find('input').prop('checked', true).trigger('change');

    $('.service-calc__format input').change(function () {
        if ($(this).is(':checked')) {
            $(this).closest('.service-calc__input-group').find('.checked').removeClass('checked');
            $(this).closest('.service-calc__format').addClass('checked');
        }
    });


    $('.gratitude__btn').click(function () {
        $(this).closest('.gratitude').find('.gratitude__items').addClass('show-all');
        $(this).parent().hide();
    });

    if ($('.publications__slider').length > 0) {
        var publicationsSlider = new Swiper('.publications__slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                prevEl: '.publications__slider-arrow--left',
                nextEl: '.publications__slider-arrow--right',
            },
            breakpoints: {
                500: {
                    slidesPerView: 2,
                },
                800: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 36,
                },
            },
        });
    }

    if ($('.team__btns').length > 0) {
        $('.team__btns').mCustomScrollbar({
            scrollInertia: 300,
        });

        $('.team__btn').click(function () {
            if (!$(this).hasClass('active')) {
                $(this).addClass('active').siblings('.active').removeClass('active');
                $('.team__tab').removeClass('active').eq($(this).index()).addClass('active');
            }
        });
    }

    $('.requirements__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.requirements__tab-content').removeClass('active').eq($(this).index()).addClass('active');
        }
    });

    $('.payment__group-head').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active').next().slideUp();
        } else {
            $('.payment__group-head.active').removeClass('active').next().slideUp();
            $(this).addClass('active').next().slideDown();
        }
    });

    if ($('.i-equipment__mob-slider').length > 0) {
        $('.i-equipment__mob-slider').each(function () {
            var elem = $(this)[0];
            var equipmentMobSlider = new Swiper(elem, {
                slidesPerView: 'auto',
                spaceBetween: 10,
            });
            // console.log(equipmentMobSlider);
        });
    }

    if ($('.team__slider').length > 0) {

        $('.team__btn').click(function () {
            if (!$(this).hasClass('active')) {
                $(this).addClass('active').siblings('.active').removeClass('active');
            }
        });
        if ($(window).width() < 960) {
            var teamSlider = new Swiper('.team__slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                breakpoints: {
                    800: {
                        slidesPerView: 2,

                    },
                },
                navigation: {
                    prevEl: '.team__slider-arrow--prev',
                    nextEl: '.team__slider-arrow--next',
                },
            });
        }
    }

    $('.vacancies__btn').click(function () {
        if (!$(this).hasClass('active')) {
            $('.vacancies__btn.active .vacancies__btn-body').hide();
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.vacancies__tab').removeClass('active').eq($(this).index()).addClass('active');
            $('.vacancies__btn.active .vacancies__btn-body').show();
        }
    });
    $('.vacancy-head').click(function () {
        if (!$(this).hasClass('active')) {
            $('.vacancy-head.active').removeClass('active').next().slideUp();
            $(this).addClass('active').next().slideDown();
        }
    });

    $('input[type="tel"]').mask('+7 (Z00) 000-00-00', {
        placeholder: '+ 7 (9__) ___-__-__',
        translation: { 'Z': { pattern: /[9]/, optional: false } },
    });
    $('input[type="tel"]').val('+7 (9');

    function downloadURI(uri, name) {
        var link = document.createElement('a');
        // If you don't know the name or want to use
        // the webserver default set name = ''
        link.setAttribute('download', name);
        link.href = uri;
        document.body.appendChild(link);
        link.click();
        link.remove();
    }

    var fileURL = '';
    $('[data-file]').click(function () {
        fileURL = $(this).attr('data-file');
    });

    document.addEventListener('wpcf7mailsent', function (event) {
        if ($(event.target).closest('#popup-requirments').length > 0) {
            var filename = fileURL.replace(/^.*[\\\/]/, '');
            downloadURI(fileURL, filename);
            setTimeout(function () {
                location = thanks_page_url;
            }, 1500);
        } else {
            location = thanks_page_url;
        }

        if ($(event.target).parent().attr('id').indexOf('wpcf7-f567') >= 0) {
            ym(91632191, 'reachGoal', 'zvonok');
        }
        if ($(event.target).parent().attr('id').indexOf('wpcf7-f301') >= 0 || $(event.target).parent().attr('id').indexOf('wpcf7-f568') >= 0) {
            ym(91632191, 'reachGoal', 'tz');
        }
        if ($(event.target).parent().attr('id').indexOf('wpcf7-f216') >= 0) {
            ym(91632191, 'reachGoal', 'raschet_ceny');
        }
        if ($(event.target).parent().attr('id').indexOf('wpcf7-f729') >= 0) {
            ym(91632191, 'reachGoal', 'treb_tz');
        }
        ym(91632191, 'reachGoal', 'vse_formy');
    }, false);
    document.addEventListener('wpcf7invalid', function (event) {
        console.log(event);
        if ($(event.target).find('button[type="submit"]').length > 0) {
            var text = $(event.target).find('button[type="submit"]').attr('data-text');
            $(event.target).find('button[type="submit"]').text(text);
        } else {
            var text = $(event.target).find('input[type="submit"]').attr('data-text');
            $(event.target).find('input[type="submit"]').val(text);
        }
    }, false);

    $('.wpcf7-form').submit(function (e) {
        if ($(this).find('button[type="submit"]').length > 0) {
            var text = $(e.target).find('button[type="submit"]').text().trim();
            $(this).find('button[type="submit"]').attr('data-text', text).text('Отправка...');
        } else {
            var text = $(e.target).find('input[type="submit"]').val().trim();
            $(this).find('input[type="submit"]').attr('data-text', text).val('Отправка...');
        }
    });

    $('.p-portfolio__cat').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.p-portfolio__cats-tab').removeClass('active').eq($(this).index()).addClass('active');
        }
    });
    $('.p-portfolio__subcat').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $(this).closest('.p-portfolio__cats-tab').find('.p-portfolio__subcats-tab.active').removeClass('active');
            $(this).closest('.p-portfolio__cats-tab').find('.p-portfolio__subcats-tab').eq($(this).index()).addClass('active');
        }
    });

    $('.i-portfolio__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.i-portfolio__tab').removeClass('active').eq($(this).index()).addClass('active');
        }
    });

    $('.header-bottom__products-btn').click(function () {
        if ($(this).hasClass('active')) {


            if ($(window).width() > 560) {
                $(this).removeClass('active');
                $('.header-bottom__products-dropdown').removeClass('active');
            } else {
                $(this).removeClass('active');
                $('.mob-menu').removeClass('active');
                $('html, body').removeClass('blocked');
            }
        } else {
            if ($(window).width() > 560) {
                $(this).addClass('active');
                $('.header-bottom__products-dropdown').addClass('active');
            } else {
                $(this).addClass('active');
                $('.mob-menu').addClass('active');
                $('html, body').addClass('blocked');
            }
        }
    });
    $('.header-bottom__products-dropdown .close-btn').click(function () {
        $('.header-bottom__products-btn').removeClass('active');
        $('.header-bottom__products-dropdown').removeClass('active');
    });

    $('body').on('click', function (e) {
        if ($('.header-bottom__products-dropdown').hasClass('active')) {
            if (!$(e.target).hasClass('header-bottom__products-btn')) {
                if ($(e.target).closest('.header-bottom__products-btn').length == 0) {
                    if ($(e.target).closest('.header-bottom__products-dropdown-inner').length == 0) {
                        $('.header-bottom__products-btn').removeClass('active');
                        $('.header-bottom__products-dropdown').removeClass('active');
                    }
                }
            }
        }
    });

    $('.sc').click(function (e) {
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 100 }, 500);
    });


    var i = 0;
    var breaks = [];

    function updateNav() {
        if ($(window).width() > 780) {

            var availableSpace = $('.header-bottom__row').width()
                - $('.header-bottom__logo-wrapper').outerWidth(true)
                - $('.header-bottom__logo-desc').outerWidth(true)
                - parseInt($('.header-bottom__menu').css('margin-left'))
                - $('.header-bottom__products-wrapper').outerWidth() - 30;
            var $vlinks = $('.header-bottom__menu ul');
            var $vlinks_items = $('.header-bottom__menu li:not(.hidden)');
            console.log('available space:');
            console.log(availableSpace);
            var $vlinksWidth = 0;
            $vlinks_items.each(function () {
                $vlinksWidth += $(this).outerWidth(true);
            });
            console.log('$vlinksWidth: ' + $vlinksWidth);
            // The visible list is overflowing the nav
            if ($vlinksWidth > availableSpace) {
                // console.log('hide!');
                i++;
                // Record the width of the list
                breaks.push($vlinks.width());

                // Move item to the hidden list
                // $vlinks.children().last().prependTo($hlinks);
                // console.log($vlinks_items.children().last());
                $vlinks_items.last().hide().addClass('hidden');

                // // Show the dropdown btn
                // if ($btn.hasClass('hidden')) {
                //     $btn.removeClass('hidden');
                // }

                // The visible list is not overflowing
            } else {

                // There is space for another item in the nav
                if (availableSpace > breaks[breaks.length - 1]) {

                    // Move the item to the visible list
                    // $hlinks.children().first().appendTo($vlinks);
                    console.log($vlinks.children('.hidden').first());
                    $vlinks.children('.hidden').first().show().removeClass('hidden');
                    breaks.pop();
                }

                // Hide the dropdown btn if hidden list is empty
                if (breaks.length < 1) {
                    // $btn.addClass('hidden');
                    // $hlinks.addClass('hidden');
                }
            }

            // Keep counter updated
            // $btn.attr("count", breaks.length);

            // Recur if the visible list is still overflowing the nav
            if ($vlinksWidth > availableSpace) {
                updateNav();
            } else {
            }

        }
    }

// Window listeners

    $(window).resize(function () {
        updateNav();
    });
    updateNav();

    $('.header-bottom__products-dropdown-inner li').mouseover(function () {
        $('.header-bottom__products-info-tab').removeClass('active').eq($(this).index()).addClass('active');
    });

    $('.projects__tab-head').click(function () {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active').siblings('.active').removeClass('active');
            $('.projects__tab').removeClass('active').eq($(this).index()).addClass('active');
        }
    });

    if ($('#calc').length > 0) {
        function collectParams() {
            var text = '';

            $('#calc .service-calc__input-group').each(function () {
                if ($(this).hasClass('service-calc__input-group--select')) {
                    var label = $(this).find('select').attr('name');
                    var value = $(this).find('select').find('option:selected').val();
                    var string = label + ' ' + value + '<br>';
                    text += string;
                }
                if ($(this).hasClass('service-calc__input-group--count')) {
                    var label = $(this).find('.service-calc__input-group-title').text();
                    var value = $(this).find('.range-output').val();
                    var string = label + ' ' + value + '<br>';
                    text += string;
                }
                if ($(this).hasClass('service-calc__input-group--formats')) {
                    var label = $(this).find('input:checked').attr('name');
                    var value = $(this).find('input:checked').val();
                    var string = label + ' ' + value + '<br>';
                    text += string;
                }
                if ($(this).hasClass('service-calc__input-group--params')) {
                    var label = $(this).find('input:checked').attr('name');
                    var value = $(this).find('input:checked').val();
                    var string = label + ' ' + value + '<br>';
                    text += string;
                }
                if ($(this).hasClass('service-calc__input-group--panels')) {
                    var label = $(this).find('input:checked').attr('name');
                    var value = $(this).find('input:checked').val();
                    var string = label + ' ' + value + '<br>';
                    text += string;
                }
            });
            $('#calc input[name="params"]').val(text);
        }

        $('#calc input, #calc select').change(function () {
            collectParams();
        });

        collectParams();
    }

    $('.mob-menu__content li.menu-item-has-children > a').click(function (e) {
        e.preventDefault();
        $(this).next().addClass('active');
        $('.mob-menu__close-btn').text('Назад').addClass('back');
    });

    $('.mob-menu__close-btn').click(function () {
        if ($(this).hasClass('back')) {
            $(this).text('Закрыть').removeClass('back');
            $('.mob-menu .sub-menu.active').removeClass('active');
        } else {
            $('.header-bottom__products-btn').removeClass('active');
            $('.mob-menu').removeClass('active');
            $('html, body').removeClass('blocked');
        }
    });

    $('.service-calc__panels-btn input').change(function () {
        let tabIndex = $('.service-calc__panels-btn input:checked').parent().index();
        $('.service-calc__panels-tab').removeClass('active').eq(tabIndex).addClass('active');
    });

    $(window).scroll(function () {
       if($(window).width() <= 780) {
           if($(window).scrollTop() > 0) {
               $('.header').addClass('fixed');
           } else {
               $('.header').removeClass('fixed');
           }
       }
    });
});