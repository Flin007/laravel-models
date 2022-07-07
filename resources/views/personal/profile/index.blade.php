@extends('personal.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Главная</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                        <div class="card-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Настойки профиля</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form
                                    action="{{ route('personal.profile.update') }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <!-- Используемое фото -->
                                        @if(auth()->user()->photo ?? '')
                                            <div class="row">
                                                <img style="height: 100px" width="100px" src="{{ Storage::url(auth()->user()->photo) }}" class="img-fluid mb-2 mx-auto rounded-circle" alt="{{ auth()->user()->name }}"/>
                                            </div>
                                        @endif

                                        <!-- Загрузка фото -->
                                        <style>
                                            .custom-file-input:lang(en)~.custom-file-label::after{
                                                content: 'Выбрать';
                                            }
                                        </style>
                                        <div class="form-group">
                                            <label for="photo">Загрузить фотографию</label>
                                            <div
                                                class="input-group {{ $errors->has('photo') ? ' is-invalid' : ''}}">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="photo"
                                                           name="photo">
                                                    <label class="custom-file-label" for="photo">Выберите
                                                        изображения</label>
                                                </div>
                                            </div>
                                            @error('photo')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Имя пользователя -->
                                        <div class="form-group">
                                            <label for="name">Имя</label>
                                            <input id="name"
                                                   name="name"
                                                   type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : ''}}"
                                                   placeholder="Ваше имя"
                                                   value="{{ auth()->user()->name }}"
                                                   required
                                            >
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Фамилия пользователя -->
                                        <div class="form-group">
                                            <label for="sname">Фамилия</label>
                                            <input id="sname"
                                                   name="sname"
                                                   type="text"
                                                   class="form-control{{ $errors->has('sname') ? ' is-invalid' : ''}}"
                                                   placeholder="Ваша фамилия"
                                                   value="{{ auth()->user()->sname }}"
                                            >
                                            @error('sname')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Email пользователя -->
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email"
                                                   type="text"
                                                   class="dissabled form-control{{ $errors->has('email') ? ' is-invalid' : ''}}"
                                                   placeholder="Ваша фамилия"
                                                   value="{{ auth()->user()->email }}"
                                                   readonly
                                            >
                                            @error('email')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Email пользователя -->
                                        <div class="form-group">
                                            <label for="phone_number">Номер телефона</label>
                                            <input id="phone_number"
                                                   name="phone_number"
                                                   type="text"
                                                   class="dissabled form-control{{ $errors->has('email') ? ' is-invalid' : ''}}"
                                                   placeholder="Контактный номер"
                                                   value="{{ auth()->user()->phone_number }}"
                                            >
                                            @error('phone_number')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Обновить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
