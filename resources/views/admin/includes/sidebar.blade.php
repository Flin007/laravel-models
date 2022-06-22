<!-- Sidebar -->
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('../../dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">Основное меню</li>
            <li class="nav-item">
                <a href="{{ Route::currentRouteName() === 'admin.girls.index' ? '#' : route('admin.girls.index') }}"
                   class="nav-link {{ Route::currentRouteName() === 'admin.girls.index' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-venus"></i>
                    <p>
                        Девушки
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- /.sidebar -->
