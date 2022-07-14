@extends('layouts.app')
@section('title', 'Восстановление пароля - ORAY AGENCY')
@section('content')
    <div class="login_register">
        <div class="header">
            Восстановление пароля
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="input_row @error('email') error @enderror">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       placeholder="Ваш email...">
                @error('email')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input_row">
                <button type="submit" class="submit">
                    Отправить ссылку
                </button>
            </div>

            <div class="footer_links">
                <div class="row">
                    <a class="btn btn-link" href="{{ route('login') }}">
                        Войти в свой аккаунт
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('register') }}">
                        Создать новый
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
