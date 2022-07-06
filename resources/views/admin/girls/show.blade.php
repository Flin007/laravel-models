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
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">{{ $girl->name }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="row d-flex justify-content-between">
                                    <h3 class="card-title">Просмотр данных девушки
                                    </h3>
                                    <div>
                                        <a href="{{ route('admin.girls.edit', $girl->id) }}" class="mr-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form class="d-inline-block"
                                              action="{{ route('admin.girls.delete', $girl->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($girlPhotos ?? '')
                                    <div class="row">
                                        @foreach($girlPhotos as $key => $photo)
                                            <div class="col-sm-2">
                                                <a href="{{ Storage::url($photo) }}" data-toggle="lightbox" data-title="{{ $girl->name }}, фото №{{ $key+1 }}" data-gallery="gallery">
                                                    <img src="{{ Storage::url($photo) }}" class="img-fluid mb-2" alt="{{ $girl->name }}"/>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{ $girl->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Имя</td>
                                        <td>{{ $girl->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата рождения</td>
                                        <td>{{ $girl->bday }}</td>
                                    </tr>
                                    <tr>
                                        <td>Город</td>
                                        <td>{{ $girl->city }}</td>
                                    </tr>
                                    <tr>
                                        <td>Номер</td>
                                        <td>
                                            <input type="text"
                                                   class="form-control"
                                                   data-inputmask='"mask": "8 (999) 999-99-99"'
                                                   data-mask
                                                   value="{{ $girl->number }}"
                                                   readonly
                                                   style="
                                                        border: unset;
                                                        background: transparent;
                                                        padding: unset;
                                                        height: unset;
                                                   "
                                            >

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Размер груди</td>
                                        <td>
                                            @isset($girl->breast_size)
                                                {{ $girl->breast_size }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Рост</td>
                                        <td>
                                            @isset($girl->height)
                                                {{ $girl->height }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Вес</td>
                                        <td>
                                            @isset($girl->weight)
                                                {{ $girl->weight }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Цвет волос</td>
                                        <td>
                                            @isset($girl->hair_color)
                                                {{ $girl->hair_color }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Татуировки?</td>
                                        <td>
                                            @isset($girl->tattoos)
                                                @if($girl->tattoos)
                                                    Есть
                                                @else
                                                    Нет
                                                @endif
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Силиконовая грудь?</td>
                                        <td>
                                            @isset($girl->silicon)
                                                @if($girl->silicon)
                                                    Да
                                                @else
                                                    Нет
                                                @endif
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Цвет глаз</td>
                                        <td>
                                            @isset($girl->eyes_color)
                                                {{ $girl->eyes_color }}
                                            @else
                                                -
                                            @endisset
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
