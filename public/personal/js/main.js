$(document).ready(function (){
   //User menu toggle
    function user_menu_toggle(e){
        let user_menu_toggle = $( ".user_menu_toggle" );
        if (user_menu_toggle.is(e.target) || user_menu_toggle.has(e.target).length > 0){
            $('.user_menu').fadeToggle('fast');
        }
        if ( !user_menu_toggle.is(e.target) // если клик был не по нашему блоку
            && user_menu_toggle.has(e.target).length === 0 ) {
            $('.user_menu').fadeOut('fast');
        }
    }

    //Обработка события нажатия
    $(document).on('click', function(e){
        user_menu_toggle(e); //Показ  и скрытие меню пользователя
    });
});
