@extends('layouts.app')
@section('title', 'Вход - ORAY AGENCY')
@section('content')
    <div class="login_register">
        <div class="header">
            Авторизация
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input_row @error('email') error @enderror">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Ваш email...">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row  @error('password') error @enderror">
                <label for="password">Пароль</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                       name="password" placeholder="Ваш пароль...">
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row">
                <div class="remember">
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        Запомнить меня
                    </label>
                </div>
                <button type="submit" class="submit">
                    Начать сеанс
                </button>
            </div>

            <div class="footer_links">
                <div class="row">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Забыли пароль?
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('register') }}">
                        Еще нет аккаунта?
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
