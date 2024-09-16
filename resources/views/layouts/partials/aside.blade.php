<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar style="border-radius: 27px;box-shadow: 0px 0px 16px -4px rgba(0, 0, 0, 0.75) !important;height: 98vh;margin: 6px;">
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/images/logo.png') }}" style="max-width: 100%;" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <style>
            .news{
            background:#fff repeat;
            font-size:14px;
            width:100%;
            height:100%;


            }

            .news a{
            color:#067CAD;
            font-weight:bold;
            margin-left:20px;

            }

            .news img{
            display:inline	;



            }
        </style>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>الاساسيات</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            @can('view','App\\Models\Record')
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('records.index')}}">
                    <i class="fe fe-archive fe-16"></i>
                    <span class="ml-3 item-text">سجلات الأيتام</span>
                    {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                </a>
            </li>
            @endcan
            @can('view','App\\Models\RecordsConstant')
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('records-recordsConstants')}}">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">الثوابت</span>
                </a>
            </li>
            @endcan


            {{-- for example --}}
            {{-- <li class="nav-item dropdown">
                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-box fe-16"></i>
                    <span class="ml-3 item-text">UI elements</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-color.html"><span class="ml-1 item-text">Colors</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-typograpy.html"><span
                                class="ml-1 item-text">Typograpy</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-icons.html"><span class="ml-1 item-text">Icons</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-buttons.html"><span
                                class="ml-1 item-text">Buttons</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-notification.html"><span
                                class="ml-1 item-text">Notifications</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-modals.html"><span class="ml-1 item-text">Modals</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-tabs-accordion.html"><span class="ml-1 item-text">Tabs &
                                Accordion</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./ui-progress.html"><span
                                class="ml-1 item-text">Progress</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="widgets.html">
                    <i class="fe fe-layers fe-16"></i>
                    <span class="ml-3 item-text">Widgets</span>
                    <span class="badge badge-pill badge-primary">New</span>
                </a>
            </li> --}}
        </ul>
        @can('view','App\\Models\User')
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>النظام</span>
        </p>
        @endcan
        <ul class="navbar-nav flex-fill w-100 mb-2">
            @can('view','App\\Models\User')
            <li class="nav-item w-100">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">المستخدمين</span>
                </a>
            </li>

            @endcan


        </ul>

        <div class="btn-box w-100 mt-3 mb-1">
            <p class="text-muted font-weight-bold h6">© تم الإنشاء بواسطة <a href="https://saeyd-jamal.github.io/My_Portfolio/" target="_blank">م.السيد الأخرس</a></p>
        </div>
    </nav>
</aside>
