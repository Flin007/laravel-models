@extends('personal.layouts.main')
@section('title', 'Личный кабинет')
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
                    <a class="active" href="#">Profile</a>
                </li>
            </ul>
        </nav>
    </section>

    <section class="profile_edit d-flex justify-content-center align-items-center">
        <form
            action="{{ route('personal.profile.update') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PATCH')

            <div class="block-image">
                @if(auth()->user()->photo)
                    <div id="profile"
                         class="{{ auth()->user()->photo ? 'hasImage' : '' }}"
                         style="background-image: url('{{ Storage::url(auth()->user()->photo) }}')"
                    >
                        <label>Обновить фото</label>
                    </div>
                @else
                    <div id="profile">
                        <label>Загрузить фото</label>
                    </div>
                @endif
                <input type="file" name="photo" id="mediaFile"/>
            </div>

            <!-- Имя, Фамилия пользователя -->
            <div class="block_fio">
                <input id="name"
                       name="name"
                       type="text"
                       class="{{ $errors->has('name') ? 'error' : ''}}"
                       placeholder="Имя"
                       value="{{ auth()->user()->name }}"
                       required
                >
                <input id="sname"
                       name="sname"
                       type="text"
                       class="{{ $errors->has('sname') ? 'error' : ''}}"
                       placeholder="Фамилия"
                       value="{{ auth()->user()->sname }}"
                >
            </div>

            <!-- Статистика пользователя -->
            <div class="block_stat">
                <div class="stat">
                    <div class="label">Контакты</div>
                    <div class="num">5</div>
                </div>
                <div class="stat">
                    <div class="label">В избранном</div>
                    <div class="num">4</div>
                </div>
                <div class="stat">
                    <div class="label">Баланс</div>
                    <div class="num">2600</div>
                </div>
            </div>

            <!-- Email и контактный номер пользователя -->
            <div class="block_contacts">
                <div class="input_row">
                    <input id="email"
                           type="text"
                           class="dissabled form-control{{ $errors->has('email') ? ' is-invalid' : ''}}"
                           placeholder="Ваша фамилия"
                           value="{{ auth()->user()->email }}"
                           readonly
                    >
                </div>
                <div class="input_row">
                    <input id="phone_number"
                           name="phone_number"
                           type="text"
                           class="dissabled form-control{{ $errors->has('email') ? ' is-invalid' : ''}}"
                           placeholder="Контактный номер"
                           value="{{ auth()->user()->phone_number }}"
                    >
                </div>
            </div>

            <!-- Submit button -->
            <div class="profile-footer">
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>

            @if($errors->any())
                <ul class="block_errors">
                    @error('name')
                    <li class="error invalid-feedback"><span>Имя</span> - {{ $message }}</li>
                    @enderror
                    @error('sname')
                    <li class="error invalid-feedback"><span>Фамилия</span> - {{ $message }}</li>
                    @enderror
                    @error('photo')
                    <li class="error invalid-feedback"><span>Фото</span> - {{ $message }}</li>
                    @enderror
                    @error('email')
                    <li class="error invalid-feedback"><span>Email</span> - {{ $message }}</li>
                    @enderror
                    @error('phone_number')
                    <li class="error invalid-feedback"><span>Номер</span> - {{ $message }}</li>
                    @enderror
                </ul>
            @endif

        </form>
    </section>
@endsection
