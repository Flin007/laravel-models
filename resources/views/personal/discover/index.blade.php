@extends('personal.layouts.main')

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
                            <li class="breadcrumb-item"><a href="{{route('personal.main.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Девушки</li>
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
                    <div class="col-sm-4 col-md-2">
                        <a href="{{ route('admin.girls.create') }}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 col-xl-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Список пользователей</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Девушка</th>
                                        <th>Город</th>
                                        <th>Номер</th>
                                        <th style="width: 40px">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($girls as $girl)
                                        <tr>
                                            <td>{{ $girl->id }}</td>
                                            <td><a href="{{ route('admin.girls.show', $girl->id) }}">{{ $girl->name }}</a></td>
                                            <td>{{ $girl->city }}</td>
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
                                            <td class="text-center">
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
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $girls->links('partials.small-right') }}
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
