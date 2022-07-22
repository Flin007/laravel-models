$(document).ready(function () {
    //User menu toggle
    function userMenuToggle(e) {
        let user_menu_toggle = $(".user_menu_toggle");
        if (user_menu_toggle.is(e.target) || user_menu_toggle.has(e.target).length > 0) {
            $('.user_menu').fadeToggle('fast');
        }
        if (!user_menu_toggle.is(e.target) // если клик был не по нашему блоку
            && user_menu_toggle.has(e.target).length === 0) {
            $('.user_menu').fadeOut('fast');
        }
    }

    //Main menu toggle and burger menu style toggle
    function burgerMenuToggle(e) {
        let burger_menu_toggle = $('.menu_burger.toggle_nav');
        let main_menu = $('.header .main_menu');
        let main_menu_list = $('.header .main_menu ul');
        if (burger_menu_toggle.is(e.target) || burger_menu_toggle.has(e.target).length > 0) {
            main_menu.slideToggle('fast');
            burger_menu_toggle.toggleClass('active');
        }
        if (!burger_menu_toggle.is(e.target) // если клик был не по нашему блоку
            && burger_menu_toggle.has(e.target).length === 0
            && !main_menu_list.is(e.target)) {
            main_menu.slideUp('fast');
            burger_menu_toggle.removeClass('active');
        }
    }

    //Обработка события нажатия
    $(document).on('click', function (e) {
        userMenuToggle(e); //Показ  и скрытие меню пользователя
        burgerMenuToggle(e); //Показ основного меню, смена стиля кнопки бургер
    });


    //Slick slider girls_slider init
    $('.girls_slider').slick({
        infinite: true,
        touchMove: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: $('.girls_slider_nav .girls_slider__prev'),
        nextArrow: $('.girls_slider_nav .girls_slider__next'),
    });

    //Modals
    $('.modal').on('click', function (e) {
        let closeButton = $(this).find('.close');
        console.log(closeButton);
        if ($(this).is(e.target)) {
            $(this).fadeOut('fast');
        }
    });
    $('.show_modal').on('click', function (e) {
        e.preventDefault()
        let modalName = $(this).data('target');
        $('.modal[data-modal="' + modalName + '"]').fadeIn('fast').css({display: 'flex'});
    });

    //Check age verified in cookies
    if (!$.cookie('age_verified')) {
        $('.age_verified_window').fadeIn('fast').css({display: 'flex'});
    }
    $('.age_verified_window .confirm_age_btn').on('click', function (e) {
        e.preventDefault();
        $.cookie('age_verified', 1);
        $('.age_verified_window').fadeOut('fast');
    });

    // ----- Profile page -----
    const PROFILE_PHOTO = $('.profile_edit #profile');
    const PROFILE_PHOTO_INPUT = $('.profile_edit #mediaFile');

    PROFILE_PHOTO.on('click', function (e) {
        PROFILE_PHOTO_INPUT.click();
    });
    PROFILE_PHOTO_INPUT.change(function (e) {
        var input = e.target;
        if (input.files && input.files[0]) {
            var file = input.files[0];

            var reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = function (e) {
                PROFILE_PHOTO.css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
            }
        }
    });
    $('.profile_edit input.error').on('input', function (){
       $(this).removeClass('error')
    });

});
