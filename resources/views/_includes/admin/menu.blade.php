<ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\AdminController::class, 'home']) }}">
            <i class="nav-icon la la-lg la-dashboard"></i> Home
        </a>
    </li>
    <li class="nav-title">Administrador</li>
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-bank"></i> Categorías</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CategoriaController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\CategoriaController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>
    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-bank"></i> Productos</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'create']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Crear</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ action([\App\Http\Controllers\Backend\ProductoController::class, 'index']) }}"><i class="nav-icon la la-lg la-puzzle"></i> Editar</a></li>
        </ul>
    </li>

    {{--    <li class="nav-title">Components</li>--}}
{{--    <li class="nav-item nav-dropdown"><a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-lg la-bank"></i> Base</a>--}}
{{--        <ul class="nav-dropdown-items">--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><i class="nav-icon la la-lg la-puzzle"></i> Breadcrumb</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/cards.html"><i class="nav-icon la la-lg la-puzzle"></i> Cards</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/carousel.html"><i class="nav-icon la la-lg la-puzzle"></i> Carousel</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/collapse.html"><i class="nav-icon la la-lg la-puzzle"></i> Collapse</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/forms.html"><i class="nav-icon la la-lg la-puzzle"></i> Forms</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/jumbotron.html"><i class="nav-icon la la-lg la-puzzle"></i> Jumbotron</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/list-group.html"><i class="nav-icon la la-lg la-puzzle"></i> List group</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/navs.html"><i class="nav-icon la la-lg la-puzzle"></i> Navs</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/pagination.html"><i class="nav-icon la la-lg la-puzzle"></i> Pagination</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/popovers.html"><i class="nav-icon la la-lg la-puzzle"></i> Popovers</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/progress.html"><i class="nav-icon la la-lg la-puzzle"></i> Progress</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/scrollspy.html"><i class="nav-icon la la-lg la-puzzle"></i> Scrollspy</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/switches.html"><i class="nav-icon la la-lg la-puzzle"></i> Switches</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/tables.html"><i class="nav-icon la la-lg la-puzzle"></i> Tables</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/tabs.html"><i class="nav-icon la la-lg la-puzzle"></i> Tabs</a></li>--}}
{{--            <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><i class="nav-icon la la-lg la-puzzle"></i> Tooltips</a></li>--}}
{{--        </ul>--}}
{{--    </li>--}}
</ul>