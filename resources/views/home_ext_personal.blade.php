@extends('personal.layouts.main')
@section('title', 'ORAY AGENCY')
@section('content')
    <!-- welcome -->
    <section class="welcome d-flex flex-direction-column justify-content-space-between">
        <div class="header">
            <div class="container d-flex justify-content-space-between align-items-center">
                <div class="menu_burger toggle_nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="right_block d-flex justify-content-space-between">
                    <div class="search_and_city d-flex justify-content-space-between align-items-center">
                        <form action="">
                            <input class="ff-inter-light" type="text" name="search" placeholder="Поиск">
                        </form>
                        <span class="city ff-inter-light">ГОРОД</span>
                    </div>
                    <div class="account">
                        @if(auth()->user())
                            <div class="user_menu_toggle">
                                @if(auth()->user()->photo ?? '')
                                    <img src="{{ Storage::url(auth()->user()->photo) }}" class="user_rounded_avatar"
                                         alt="{{ auth()->user()->name }}"/>
                                @else
                                    <span class="user_rounded_avatar no_avatar"></span>
                                @endif
                            </div>
                            <nav class="user_menu">
                                <ul>
                                    <li><a href="{{ route('personal.discover.index') }}">Модели</a></li>
                                    <li><a href="{{ route('personal.profile.index') }}">Профиль</a></li>
                                    @if(auth()->user()->role == 0)
                                        <li><a href="{{ route('admin.main.index') }}">Админка</a></li>
                                    @endif
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <input class="btn" type="submit" value="Выход">
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        @else
                            <a class="login_link" href="/login">Вход</a>
                        @endif
                    </div>
                </div>
            </div>
            <nav class="main_menu">
                <ul class="d-flex justify-content-center align-items-center">
                    <li><a class="active" href="">О сервисе</a></li>
                    <li><a href="">Топ моделей</a></li>
                    <li><a href="">Сейчас доступные</a></li>
                </ul>
            </nav>
        </div>
        <div class="logo_container">
            <div class="logo"></div>
        </div>
        <div class="footer">
            <h2>CONNECT US NOW</h2>
            <a href="" class="tg_button">
                TELEGRAM
            </a>
            <p class="mt-1 color-white fw-b ta-c">24/7</p>
        </div>
    </section>

    <!-- slider_after_main -->
    <section class="slider_after_main">
        <div class="header d-flex justify-content-space-between align-items-center">
            <div class="social">
                <span class="color-white">ПРИСОЕДИНЯЙСЯ: </span>
                <a class="link tg" href="#"></a>
            </div>
            <div class="girls_slider_nav color-white">
                <a class="girls_slider__prev"><span><</span> НАЗАД</a>
                <span> / </span>
                <a class="girls_slider__next">ДАЛЕЕ <span>></span></a>
            </div>
        </div>
        <div class="girls_slider">
            @if(count($girls_slider) > 0)
                @foreach($girls_slider as $girl)
                    <div>
                        <img src="{{ Storage::url($girl['photo']) }}" alt="">
                        <span class="name">{{ $girl['name'] }}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <!-- girls_grid -->
    <section class="girls_grid">
        <h2>COLLECTION OF THE MOST BEAUTIFUL <br>
            PRIVAT ESCORTS <span>IN MOSCOW</span></h2>
        <div class="grid_toggle">
            <span class="active">ВСЕ МОДЕЛИ</span>
             |
            <span>СЕЙЧАС ДОСТУПНЫЕ</span>
        </div>
        <div class="grid g-all">
            @foreach($popular_girls as $girl)
                <div class="grid-item" style='background-image: url("{{ Storage::url($girl['photo']) }}")'>
                    <h3>{{ $girl['name'] }}</h3>
                    <div class="girl_data d-flex align-items-center justify-content-center">
                        <div class="data-container">
                            <div class="header">
                                <div class="age">
                                    <span>Возраст</span>
                                    <span>{{ $girl['age'] }}</span>
                                </div>
                                <div class="city">
                                    <span>Город</span>
                                    <span>{{ $girl['city'] }}</span>
                                </div>
                            </div>
                            <div class="price">{{ $girl['price'] }} р</div>
                            <div class="ta-c"><a href="">Выбрать</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="" class="show_all">ВСЕ МОДЕЛИ</a>
    </section>
@endsection
