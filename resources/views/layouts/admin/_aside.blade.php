<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" style="width:150px;" src="{{asset('/images/sanad logo 2-05.png')}}" alt="User Image">
    </div>

    <ul class="app-menu">
        {{--admins--}}
        <li><a class="app-menu_item" href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.overview') }}</span></a></li>
        <li><a class="app-menu_item " href="{{route('admins.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Admins') }}</span></a></li>
        <li><a class="app-menu_item " href="{{route('clints.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Users') }}</span></a></li>
        <li><a class="app-menu_item " href="{{route('Companies.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.Companies') }}</span></a></li>
        <li><a class="app-menu_item " href="{{route('driver.index')}}"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">{{ trans('admin.driver') }}</span></a></li>
    <li class="treeview is-expanded"><a class="app-menu_item" href="#" data-toggle="treeview"><i class="app-menuicon fa fa-edit"></i><span class="app-menu_label">{{ trans('admin.settings') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

              <li><a class="treeview-item" href="#">
                <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                      {{ trans('admin.contact') }}</a></li>
               <li><a class="treeview-item" href="#">
                <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                       {{ trans('admin.about') }}</a></li>
               <li><a class="treeview-item" href="#">
                <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                       {{ trans('admin.FAQ') }}</a></li>
            </ul>
          </li>
        <li class="treeview is-expanded"><a class="app-menu_item" href="#" data-toggle="treeview"><i class="app-menuicon fa fa-edit"></i><span class="app-menu_label">{{ trans('admin.Transaction') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="#">
                        <i class="app-menu_icon fa fa-users"></i><span class="app-menu_label">
                        {{trans('admin.balanced') }}</a></li>
                <li><a class="treeview-item" href="#">
                        <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                        {{ trans('admin.withdraw') }}</a></li>
                <li><a class="treeview-item" href="#">
                        <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                        {{ trans('admin.refunds') }}</a></li>
                <li><a class="treeview-item" href="#">
                        <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                        {{ trans('admin.sell') }}</a></li>

                <li><a class="treeview-item" href="#">
                        <i class="app-menu_icon fa fa-users"></i> <span class="app-menu_label">
                        {{ trans('admin.prop_account') }}</a></li>

            </ul>
        </li>

        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">     {{ trans('admin.invested') }}</span></a></li>

        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">     {{ trans('admin.account_admin') }}</span></a></li>

        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">     {{ trans('admin.payment') }}</span></a></li>
        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">     {{ trans('admin.banners') }}</span></a></li>

        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">      {{ trans('admin.person') }}</span></a></li>

        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">     {{ trans('admin.make_invest') }}</span></a></li>
        <li><a class="app-menu_item " href="#"><i class="app-menuicon fa fa-users"></i> <span class="app-menu_label">      {{ trans('admin.notifications') }}</span></a></li>

    </ul>
</aside>