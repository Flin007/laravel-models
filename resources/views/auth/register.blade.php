@extends('layouts.app')
@section('title', 'Регистрация - ORAY AGENCY')
@section('content')
    <div class="login_register">
        <div class="header">
            Регистрация
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input_row  @error('name') error @enderror">
                <label for="name">Имя</label>
                <input id="name" type="text" name="name"
                       value="{{ old('name') }}" required autocomplete="name"
                       autofocus placeholder="Ваше имя...">
                @error('name')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row  @error('email') error @enderror">
                <label for="email">Email</label>
                <input id="email" type="email" name="email"
                       value="{{ old('email') }}" required autocomplete="email"
                       placeholder="Ваш email...">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row  @error('password') error @enderror">
                <label for="password">Пароль</label>
                <input id="password" type="password" name="password"
                       required autocomplete="new-password">
                @error('password')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row  @error('password-confirm') error @enderror">
                <label for="password-confirm">Повторите пароль</label>
                <input id="password-confirm" type="password" name="password_confirmation"
                       required autocomplete="new-password">
            </div>

            <div class="input_row">
                <button type="submit" class="submit">
                    Зарегистрироваться
                </button>
            </div>

            <div class="footer_links">
                <div class="row">
                    <a href="{{ route('login') }}">
                        Уже есть аккаунт?
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
