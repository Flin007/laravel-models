@extends('admin.layouts.main')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Панель управления</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.girls.index') }}">Девушки</a></li>
                            <li class="breadcrumb-item active">Добавить</li>
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
                                    <h3 class="card-title">Добавление девушки</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form
                                    action="{{ route('admin.girls.store') }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                >
                                    @csrf
                                    <div class="card-body">
                                        <!-- Фотографии -->
                                        <style>
                                            .custom-file-input:lang(en)~.custom-file-label::after{
                                                content: 'Выбрать';
                                            }
                                        </style>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Фотографии</label>
                                            <div
                                                class="input-group {{ $errors->has('photos') ? ' is-invalid' : ''}}">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="photos"
                                                           name="photos[]" multiple>
                                                    <label class="custom-file-label" for="photos">Выберите
                                                        изображения</label>
                                                </div>
                                            </div>
                                            @error('photos')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Имя девушки -->
                                        <div class="form-group">
                                            <label for="name">Имя</label>
                                            <input id="name"
                                                   name="name"
                                                   type="text"
                                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : ''}}"
                                                   placeholder="Имя девушки"
                                                   value="{{ old('name') }}"
                                            >
                                            @error('name')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Дата рождения -->
                                        <div class="form-group">
                                            <label for="bday">Дата рождения</label>
                                            <div class="input-group date{{ $errors->has('bday') ? ' is-invalid' : ''}}" id="reservationdate" data-target-input="nearest">
                                                <input id="bday"
                                                       name="bday"
                                                       type="text"
                                                       class="form-control datetimepicker-input{{ $errors->has('bday') ? ' is-invalid' : ''}}"
                                                       data-target="#reservationdate"
                                                       placeholder="03.05.1992"
                                                       value="{{ old('bday') }}"
                                                />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                            @error('bday')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Город -->
                                        <div class="form-group">
                                            <label for="city">Город</label>
                                            <input id="city"
                                                   name="city"
                                                   type="text"
                                                   class="form-control{{ $errors->has('city') ? ' is-invalid' : ''}}"
                                                   placeholder="Город"
                                                   value="{{ old('city') }}"
                                            >
                                            @error('city')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Контактный номер -->
                                        <div class="form-group">
                                            <label for="number">Контактный номер</label>
                                            <input id="number"
                                                   name="number"
                                                   type="text"
                                                   class="form-control{{ $errors->has('number') ? ' is-invalid' : ''}}"
                                                   placeholder="Контактный номер"
                                                   value="{{ old('number') }}"
                                            >
                                            @error('number')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Размер груди -->
                                        <div class="form-group">
                                            <label for="breast_size">Размер груди<span class="small text-muted"> Необязательное</span></label>
                                            <input id="breast_size"
                                                   name="breast_size"
                                                   type="text"
                                                   class="form-control{{ $errors->has('breast_size') ? ' is-invalid' : ''}}"
                                                   placeholder="3"
                                                   value="{{ old('breast_size') }}"
                                            >
                                            @error('breast_size')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Рост, см -->
                                        <div class="form-group">
                                            <label for="height">Рост, см<span class="small text-muted"> Необязательное</span></label>
                                            <input id="height"
                                                   name="height"
                                                   type="text"
                                                   class="form-control{{ $errors->has('height') ? ' is-invalid' : ''}}"
                                                   placeholder="175"
                                                   value="{{ old('height') }}"
                                            >
                                            @error('height')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Вес, кг -->
                                        <div class="form-group">
                                            <label for="weight">Вес, кг<span class="small text-muted"> Необязательное</span></label>
                                            <input id="weight"
                                                   name="weight"
                                                   type="text"
                                                   class="form-control{{ $errors->has('weight') ? ' is-invalid' : ''}}"
                                                   placeholder="58"
                                                   value="{{ old('weight') }}"
                                            >
                                            @error('weight')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Цвет волос -->
                                        <div class="form-group">
                                            <label for="hair_color">Цвет волос<span class="small text-muted"> Необязательное</span></label>
                                            <input id="hair_color"
                                                   name="hair_color"
                                                   type="text"
                                                   class="form-control{{ $errors->has('hair_color') ? ' is-invalid' : ''}}"
                                                   placeholder="Блондинка"
                                                   value="{{ old('hair_color') }}"
                                            >
                                            @error('hair_color')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Наличие татуировок? -->
                                        <div class="form-group">
                                            <label for="tattoos">Наличие татуировок?<span class="small text-muted"> Необязательное, принимает: 1,0,true,false</span></label>
                                            <input id="tattoos"
                                                   name="tattoos"
                                                   type="text"
                                                   class="form-control{{ $errors->has('tattoos') ? ' is-invalid' : ''}}"
                                                   placeholder="true"
                                                   value="{{ old('tattoos') }}"
                                            >
                                            @error('tattoos')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Наличие татуировок? -->
                                        <div class="form-group">
                                            <label for="silicon">Силиконовая грудь?<span class="small text-muted"> Необязательное, принимает: 1,0,true,false</span></label>
                                            <input id="silicon"
                                                   name="silicon"
                                                   type="text"
                                                   class="form-control{{ $errors->has('silicon') ? ' is-invalid' : ''}}"
                                                   placeholder="true"
                                                   value="{{ old('silicon') }}"
                                            >
                                            @error('silicon')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Цвет глаз -->
                                        <div class="form-group">
                                            <label for="eyes_color">Цвет глаз<span class="small text-muted"> Необязательное</span></label>
                                            <input id="eyes_color"
                                                   name="eyes_color"
                                                   type="text"
                                                   class="form-control{{ $errors->has('eyes_color') ? ' is-invalid' : ''}}"
                                                   placeholder="Голубые"
                                                   value="{{ old('eyes_color') }}"
                                            >
                                            @error('eyes_color')
                                            <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Добавить</button>
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
