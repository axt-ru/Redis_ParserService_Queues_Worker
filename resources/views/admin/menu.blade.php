<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка главная</a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('admin.create') }}">Добавить новость</a>
</li>
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Test Pages
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item {{ request()->routeIs('admin.test1') ? 'active' : '' }}" href="{{ route('admin.test1') }}">
            Test1 (Download JSON)
        </a>
        <a class="dropdown-item {{ request()->routeIs('admin.test2') ? 'active' : '' }}" href="{{ route('admin.test2') }}">
            Test2 (Download image)
        </a>
        <a class="dropdown-item {{ request()->routeIs('admin.test3') ? 'active' : '' }}" href="{{ route('admin.test3') }}">
            Test3 (Export News)
        </a>
    </div>
</li>
