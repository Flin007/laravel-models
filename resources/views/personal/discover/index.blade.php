@extends('personal.layouts.main')
@section('title', 'Модели')
@section('content')
    @include('personal.includes.personal.header')
    <section class="personal_breadcrumbs container d-flex justify-content-flex-end">
        <nav>
            <ul>
                <li>
                    <a href="/">ORAY</a>
                </li>
                <li>
                    <a href="{{ route('personal.discover.index') }}">Personal</a>
                </li>
                <li>
                    <a class="active" href="#">Discover</a>
                </li>
            </ul>
        </nav>
    </section>

    <!-- girls_grid -->
    <section class="girls_grid">
        <h2>COLLECTION OF THE MOST BEAUTIFUL <br>
            PRIVAT ESCORTS <span>IN MOSCOW</span></h2>
        <div class="grid g-all {{$count ? 'small' : ''}}">
            @foreach($girls as $girl)
                @if($girl->photo)
                 <div class="grid-item" style='background-image: url("{{ Storage::url($girl->photo) }}")'>
                @else
                <div class="grid-item no-photo">
                @endif
                    <h3>{{ $girl->name }}</h3>
                    <div class="girl_data d-flex align-items-center justify-content-center">
                        <div class="data-container">
                            <div class="header">
                                <div class="age">
                                    <span>Возраст</span>
                                    <span>{{ $girl->age < 18 ? '-' : $girl->age }}</span>
                                </div>
                                <div class="city">
                                    <span>Город</span>
                                    <span>{{ $girl->city }}</span>
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
        {{ $girls->links('partials.small-right') }}
    </section>

@endsection
