<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width:150px;" src="{{asset('/images/sanad logo 2-05.png')}}" alt="User Image">
    </div>

    <ul class="app-menu">

        {{--admins--}}
        {{-- <li><a class="app-menu_item " href="{{route('overview')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.overview') }}</span></a></li> --}}
        <li><a class="app-menu_item " href="{{route('admins.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Admins') }}</span></a></li>
        {{-- <li><a class="app-menu_item " href="{{route('users.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Users') }}</span></a></li> --}}
        {{-- <li><a class="app-menu_item " href="{{route('transactions.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Transaction') }}</span></a></li> --}}
        {{-- <li><a class="app-menu_item " href="{{route('properties.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Properties') }}</span></a></li> --}}
        {{-- <li><a class="app-menu_item " href="{{route('accounts.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.accounts') }}</span></a></li> --}}

    </ul>
</aside>
