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
                                    <span class="user_rounded_avatar"
                                          style="background-image: url('{{ Storage::url(auth()->user()->photo) }}')"
                                    ></span>
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
                                    <span>{{ $girl->age < 18 ? '-' : $girl->age }}</span>
                                </div>
                                <div class="city">
                                    <span>Город</span>
                                    <span>{{ $girl['city'] }}</span>
                                </div>
                            </div>
                            <div class="price">{{ $girl->price ? $girl->price.' р' : '-' }}</div>
                            <div class="ta-c">
                                <a href="{{ route('personal.discover.show', $girl->id) }}">Выбрать</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('personal.discover.index') }}" class="show_all">ВСЕ МОДЕЛИ</a>
    </section><!-- /girls_grid -->

    <section class="statistic d-flex justify-content-center">
        <div class="item">
            <h3>более <span>100</span></h3>
            <span>довольных гостей</span>
        </div>
        <div class="item">
            <h3>более <span>70</span></h3>
            <span>проверенных моделей</span>
        </div>
    </section>
    <section class="about_service d-flex">
        <div class="left"></div>
        <div class="right">
            <h2>О СЕРВИСЕ</h2>
            <div class="content">
                <div class="item">
                    <h3>ГОСТЯМ</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
                <div class="item">
                    <h3>МОДЕЛЯМ</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div>
            </div>
        </div>
    </section>
    <div class="age_verified_window">
        <div class="content">
            <div class="left">
                <svg xmlns="http://www.w3.org/2000/svg" width="167" height="46" viewBox="0 0 167 46" fill="none">
                    <path d="M0.523926 14.7687C0.679182 14.2059 0.834439 13.6625 1.02851 13.1386C1.94064 10.5186 3.26032 8.22858 4.98754 6.26847C6.71477 4.30836 8.83013 2.7752 11.3336 1.669C13.8371 0.562799 16.6706 0 19.8145 0C22.9973 0 25.8307 0.562799 28.3148 1.669C30.7989 2.7752 32.9143 4.30836 34.6415 6.26847C36.3687 8.22858 37.6884 10.5186 38.6005 13.1386C38.7946 13.682 38.9498 14.2253 39.1051 14.7687H29.8674C29.4986 13.7402 29.0134 12.7892 28.4312 11.9353C27.5579 10.6156 26.3935 9.56767 24.9768 8.77198C23.5601 7.9957 21.8328 7.58814 19.8145 7.58814C17.7768 7.58814 16.069 7.97629 14.6522 8.77198C13.2355 9.54826 12.0905 10.6156 11.1978 11.9353C10.6156 12.8086 10.1498 13.7596 9.76167 14.7687H0.523926ZM46.111 14.7687V0.989754H68.2351C70.0787 0.989754 71.7283 1.28087 73.2032 1.88248C74.6782 2.4841 75.9396 3.29919 76.9876 4.32776C78.0356 5.35634 78.8507 6.55957 79.3941 7.91807C79.9569 9.27656 80.2286 10.7515 80.2286 12.3041C80.2286 13.1774 80.1704 13.9925 80.0345 14.7687H71.1655C71.2043 14.4194 71.2237 14.0701 71.2237 13.682C71.2237 11.683 70.6997 10.2469 69.6712 9.35419C68.6426 8.46147 67.09 7.9957 65.0135 7.9957H55.1353V14.7687H46.111ZM86.6911 14.7687C86.8464 14.2059 87.0016 13.6625 87.1957 13.1386C88.1078 10.5186 89.4275 8.22858 91.1547 6.26847C92.882 4.30836 94.9973 2.7752 97.5008 1.669C100.004 0.562799 102.838 0 105.982 0C108.097 0 110.135 0.310517 112.095 0.950949C114.074 1.59138 115.84 2.5035 117.432 3.74555C119.023 4.9682 120.324 6.48195 121.371 8.2868C122.4 10.0917 123.04 12.1488 123.273 14.4971H114.657C114.113 12.207 113.085 10.4798 111.552 9.33478C110.018 8.18976 108.155 7.60756 105.982 7.60756C103.944 7.60756 102.236 7.99569 100.819 8.79138C99.4027 9.56766 98.2577 10.635 97.365 11.9547C96.7828 12.828 96.317 13.779 95.9289 14.7882H86.6911V14.7687ZM145.048 14.7687H135.053L126.767 0.989754H136.878L145.048 14.7687ZM157.76 14.7687H147.901L156.013 0.989754H166.066L157.76 14.7687Z" fill="#FFB796"/>
                    <path d="M39.2022 30.2944C39.0276 30.9349 38.8529 31.5559 38.62 32.1575C37.7079 34.7387 36.3882 36.9899 34.661 38.9112C32.9338 40.8325 30.8378 42.3268 28.3343 43.4136C25.8502 44.5004 23.0168 45.0438 19.834 45.0438C16.6901 45.0438 13.8761 44.5004 11.3532 43.4136C8.84966 42.3268 6.73429 40.813 5.00707 38.9112C3.27984 36.9899 1.96016 34.7387 1.04803 32.1575C0.834554 31.5559 0.640484 30.9155 0.46582 30.2944H9.72297C10.1111 31.3424 10.5963 32.3322 11.1979 33.2249C12.0712 34.5252 13.2356 35.5731 14.6524 36.3494C16.0691 37.1257 17.7963 37.5333 19.8146 37.5333C21.8524 37.5333 23.5602 37.1451 24.9769 36.3494C26.3936 35.5731 27.5386 34.5252 28.4313 33.2249C29.033 32.3322 29.5375 31.3424 29.9063 30.2944H39.2022ZM123.933 30.2944V44.1317H118.189L117.277 39.474C115.666 41.5505 113.88 42.9866 111.94 43.8017C109.98 44.6168 108.02 45.0438 106.021 45.0438C102.877 45.0438 100.063 44.5004 97.5398 43.4136C95.0363 42.3268 92.9209 40.813 91.1937 38.9112C89.4665 36.9899 88.1468 34.7387 87.2346 32.1575C87.0212 31.5559 86.8271 30.9155 86.6524 30.2944H95.9096C96.2977 31.3424 96.7829 32.3322 97.3845 33.2249C98.2578 34.5252 99.4222 35.5731 100.839 36.3494C102.256 37.1257 103.983 37.5333 106.001 37.5333C108.99 37.5333 111.299 36.7764 112.93 35.2626C114.23 34.04 115.103 32.3904 115.53 30.2944H123.933ZM55.1742 30.2944V44.1317H46.15V30.2944H55.1742ZM79.0643 30.2944C79.1613 30.6244 79.2584 30.9737 79.3166 31.323C79.5301 32.3516 79.6659 33.3996 79.7435 34.4281C79.7823 35.088 79.8212 35.8449 79.86 36.7182C79.8988 37.5915 79.957 38.5036 80.054 39.4157C80.1511 40.3279 80.3063 41.2012 80.5198 42.0357C80.7333 42.8508 81.0438 43.5494 81.4708 44.1317H72.4465C71.9419 42.8314 71.6508 41.2788 71.5344 39.474C71.4179 37.6691 71.2432 35.9419 71.0104 34.3117C70.7581 32.6039 70.3117 31.2648 69.6325 30.2944H79.0643ZM150.89 30.2944V44.1317H141.865V30.2944H150.89Z" fill="#FFB796"/>
                    <path d="M5.74448 23.8512L4.59946 19.0771H4.56065L3.41564 23.8512H5.74448ZM6.0744 17.214L9.19893 27.849H6.71483L6.17144 25.5978H3.0275L2.4841 27.849H0L3.12453 17.214H6.0744Z" fill="#FFE0CB"/>
                    <path d="M35.9806 20.4744H38.5618C38.5618 19.4264 38.2319 18.6307 37.5914 18.0679C36.9316 17.5051 35.8836 17.2334 34.4087 17.2334C33.5548 17.2334 32.8173 17.3498 32.2545 17.5633C31.6723 17.7768 31.2259 18.1067 30.8572 18.5531C30.5079 18.98 30.2556 19.5428 30.1197 20.1833C29.9839 20.8431 29.9062 21.6 29.9062 22.4539C29.9062 23.3466 29.9645 24.1229 30.0615 24.8021C30.1585 25.4814 30.3526 26.0442 30.6437 26.51C30.9348 26.9757 31.3424 27.3057 31.8664 27.5385C32.3904 27.752 33.0502 27.8684 33.8847 27.8684C34.5251 27.8684 35.0685 27.7908 35.5343 27.6162C36.0001 27.4415 36.3882 27.1698 36.6987 26.7623H36.7375V27.7132H38.717V22.1628H34.3505V23.6959H36.1359V24.7439C36.1359 25.0156 36.0777 25.2679 35.9612 25.462C35.8448 25.6755 35.709 25.8307 35.5343 25.9666C35.3596 26.1024 35.185 26.1995 34.9909 26.2771C34.7968 26.3353 34.6222 26.3741 34.4475 26.3741C34.0594 26.3741 33.7488 26.2771 33.4965 26.1024C33.2443 25.9083 33.0696 25.656 32.9337 25.2873C32.7979 24.938 32.7203 24.511 32.662 24.0065C32.6038 23.5019 32.5844 22.9585 32.5844 22.3374C32.5844 21.0566 32.7203 20.1251 33.0114 19.5817C33.3025 19.0189 33.7682 18.7471 34.4281 18.7471C34.6998 18.7471 34.9327 18.8054 35.1267 18.9218C35.3208 19.0383 35.4761 19.1741 35.6119 19.3294C35.7284 19.504 35.8254 19.6787 35.8836 19.8922C35.9612 20.0862 35.9806 20.2803 35.9806 20.4744Z" fill="#FFE0CB"/>
                    <path d="M66.2361 17.214H58.4927V27.849H66.4301V26.083H61.2873V23.2302H65.945V21.4835H61.2873V18.98H66.2361V17.214Z" fill="#FFE0CB"/>
                    <path d="M89.3304 17.214H86.1089V27.849H88.6706V20.3967H88.7094L92.1251 27.849H95.3078V17.214H92.7461V24.4916H92.7073L89.3304 17.214Z" fill="#FFE0CB"/>
                    <path d="M120.537 20.882H123.235C123.235 20.5133 123.196 20.1058 123.138 19.6788C123.06 19.2519 122.905 18.8443 122.614 18.4756C122.342 18.1068 121.915 17.7963 121.372 17.5634C120.809 17.3306 120.052 17.1947 119.101 17.1947C118.092 17.1947 117.277 17.3306 116.675 17.5828C116.074 17.8545 115.608 18.2233 115.297 18.689C114.987 19.1548 114.773 19.7176 114.676 20.3775C114.579 21.0373 114.541 21.7554 114.541 22.5316C114.541 23.3273 114.579 24.0454 114.676 24.6858C114.773 25.3457 114.967 25.9085 115.297 26.3742C115.608 26.84 116.074 27.2087 116.675 27.461C117.277 27.7133 118.092 27.8298 119.101 27.8298C119.994 27.8298 120.712 27.7327 121.275 27.5192C121.838 27.3058 122.265 27.0147 122.575 26.6459C122.886 26.2772 123.099 25.8308 123.196 25.3457C123.312 24.8411 123.371 24.3171 123.371 23.7543H120.673C120.673 24.3171 120.634 24.7634 120.537 25.0934C120.44 25.4427 120.324 25.695 120.188 25.8891C120.033 26.0831 119.858 26.1996 119.645 26.2578C119.431 26.316 119.218 26.3548 118.985 26.3548C118.694 26.3548 118.441 26.316 118.228 26.219C118.014 26.1219 117.82 25.9473 117.684 25.695C117.549 25.4233 117.432 25.0546 117.374 24.5888C117.296 24.1036 117.277 23.4826 117.277 22.7063C117.277 21.9688 117.296 21.3672 117.355 20.8626C117.413 20.3581 117.49 19.9505 117.626 19.64C117.743 19.3295 117.917 19.0966 118.15 18.9607C118.364 18.8249 118.655 18.7473 118.985 18.7473C119.606 18.7473 120.013 18.9219 120.246 19.2519C120.421 19.5818 120.537 20.1446 120.537 20.882Z" fill="#FFE0CB"/>
                    <path d="M144.039 17.214H140.895L144.485 23.6571V27.849H147.28V23.6571L150.89 17.214H147.843L145.902 21.3283H145.863L144.039 17.214Z" fill="#FFE0CB"/>
                </svg>
                <div class="confirm_age">
                    <h2>ПОДТВЕРДИТЕ СВОЙ ВОЗРАСТ</h2>
                    <p>Наш сервис предназначен для лиц, достигших совершеннолетнего возраста. Нажимая кнопку “подтвердить”, Вы подтверждаете свой возраст.</p>
                </div>
                <a class="confirm_age_btn" href="">ПОДТВЕРДИТЬ</a>
            </div>
            <div class="right">

            </div>
        </div>
    </div>
@endsection
