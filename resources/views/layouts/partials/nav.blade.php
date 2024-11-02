<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
    <div class="container-fluid">
        <a class="navbar-brand mx-lg-1 mr-0 d-flex align-items-end"  href="{{ route('records.index') }}">
            <img src="{{ asset('assets/images/logo.png') }}" style="max-width: 80px">
            <h1 class="h3 ml-3">دار اليتيم الفلسطيني</h1>
        </a>
        <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
            <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
            <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                <i class="fe fe-x"><span class="sr-only"></span></i>
            </a>
            <ul class="navbar-nav mr-auto">
                @can('view','App\\Models\Record')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{route('records.index')}}">
                            <i class="fe fe-archive fe-16"></i>
                            <span class="ml-3 item-text">سجلات الأيتام</span>
                        </a>
                    </li>
                @endcan
                @can('view','App\\Models\RecordsConstant')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{route('records-recordsConstants')}}">
                            <i class="fe fe-layers fe-16"></i>
                            <span class="ml-3 item-text">الثوابت</span>
                        </a>
                    </li>
                @endcan
                @can('view','App\\Models\User')
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="{{route('users.index')}}">
                            <i class="fe fe-users fe-16"></i>
                            <span class="ml-3 item-text">المستخدمين</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
        <ul class="navbar-nav d-flex flex-row">
            @stack('extra-navbar-items')
            <li class="nav-item">
                <a class="nav-link text-muted my-2" href="./#" id="modeSwitcher" data-mode="light">
                    <i class="fe fe-sun fe-16"></i>
                </a>
            </li>
            <li class="nav-item dropdown ml-lg-0">
                <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar avatar-sm mt-2">
                        <img src="{{ asset('assets/avatars/face-4.jpg') }}" alt="..." class="avatar-img rounded-circle">
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right" style="z-index: 9999;" aria-labelledby="navbarDropdownMenuLink">
                    <li class="nav-item">
                        {{-- <a class="nav-link pl-3" href="#">الملف الشخصي</a> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link pl-3" href="#">Activities</a> --}}
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="nav-link pl-3 btn border-0 bg-transparent">تسجيل خروج</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
