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
});
