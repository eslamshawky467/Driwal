
<div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
<aside class="app-sidebar" style="background-color: #161616">
        <li><a class="app-menu__item " href=" {{ route('dashboard') }}"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">{{ trans('admin.overview') }}</span></a></li>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">{{ trans('admin.Admins') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="{{route('admins.create')}}">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.create') }}</span></a>
              </li>
              <li>
                <a class="treeview-item" href="{{route('admins.index')}}"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">{{ trans('admin.index') }}</span></a>
              </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">{{ trans('admin.Users') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('clints.create')}}"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.createuser') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('clints.index')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('admin.Users') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('client_accounts.index')}}"><i class="app-menu__icon fa fa-credit-card"></i> <span class="app-menu__label">{{ trans('admin.client_account') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>


    <ul class="app-menu" >

        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">{{ trans('admin.freeOrder') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('order.active')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.active') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.approved')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.approved') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.finished')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.finished') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.inActive')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.inActive') }}</span></a>
                </li>


            </ul>
        </li>

    </ul>



    <ul class="app-menu" >

        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">{{ trans('admin.payedOrder') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('order.active.payed')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.active') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.approved.payed')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.approved') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.finished.payed')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.finished') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('order.inActive.payed')}}"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">{{ trans('order.inActive') }}</span></a>
                </li>


            </ul>
        </li>

    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">{{ trans('admin.company') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li><a class="treeview-item" href="{{route('Companies.create')}}">
                    <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.createcompany') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('Companies.index')}}"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">{{ trans('admin.companies') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview  " style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">{{ trans('driver.banners') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('banner.create')}}"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('driver.createbanner') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('banner.index')}}"><i class="app-menu__icon fa fa-picture-o"></i> <span class="app-menu__label">{{ trans('driver.banners') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>
   <ul class="app-menu" >
        <li class="treeview  " style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">{{ trans('admin.settings') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('contact_us.index')}}"><i class="app-menu__icon fa fa-connectdevelop"></i> <span class="app-menu__label">{{ trans('admin.contact') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('about_us')}}"><i class="app-menu__icon fa fa-info"></i> <span class="app-menu__label">{{ trans('admin.about') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('qa.index')}}"><i class="app-menu__icon fa fa-question"></i> <span class="app-menu__label">{{ trans('admin.FAQ') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-universal-access"></i><span class="app-menu__label">{{ trans('admin.driver') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('driver.create')}}"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.createdriver') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('driver.index')}}"><i class="app-menu__icon fa fa-universal-access"></i> <span class="app-menu__label">{{ trans('admin.drivers') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{route('driversaccounts.index')}}"><i class="app-menu__icon fa fa-credit-card"></i> <span class="app-menu__label">{{ trans('admin.driversaccounts') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>



    <ul class="app-menu" >
        <li class="treeview  " style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-usd"></i><span class="app-menu__label">{{ trans('admin.cost') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{route('costs.index')}}"><i class="app-menu__icon fa fa-pencil-square"></i> <span class="app-menu__label">{{ trans('admin.editcost') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">{{ trans('admin.package') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{ route('packages.create') }}"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.createpackage') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('packages.index') }}"><i class="app-menu__icon fa fa-archive"></i> <span class="app-menu__label">{{ trans('admin.packages') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('packages.search') }}"><i class="app-menu__icon fa fa-search"></i> <span class="app-menu__label">{{ trans('admin.search') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-map-marker"></i><span class="app-menu__label">{{ trans('admin.zone') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="{{ route('zones.create') }}"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">{{ trans('admin.createzone') }}</span></a>
                </li>
                <li>
                    <a class="treeview-item" href="{{ route('zones.index') }}"><i class="app-menu__icon fa fa-map-marker"></i> <span class="app-menu__label">{{ trans('admin.zones') }}</span></a>
                </li>
            </ul>
        </li>
    </ul>
    <li>
        <a class="treeview-item" href="{{route('map.index')}}">
        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
            {{ trans('map index') }}</a></li>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">{{ trans('admin.Companies') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="{{route('ad.index')}}">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            {{ trans('admin.ad') }}</a>
                        </li>
                       <li><a class="treeview-item" href="{{route('ad.index')}}">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            {{ trans('admin.ad') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">{{ trans('admin.Companies') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="{{route('requests.index')}}">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            {{ trans('admin.requests') }}</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">{{ trans('car.car_types') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="{{route('car_type.create')}}">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            {{ trans('car.create_car_types') }}</a>
                        </li>
                       <li><a class="treeview-item" href="{{route('car_type.index')}}">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            {{ trans('car.index_car_types') }}</a>
                        </li>

                    </ul>
                </li>
            </ul>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">{{ trans('car.car_models') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="{{route('car_model.create')}}">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            {{ trans('car.create_car_models') }}</a>
                        </li>
                       <li><a class="treeview-item" href="{{route('car_model.index')}}">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            {{ trans('car.index_car_models') }}</a>
                        </li>

                    </ul>
                </li>
            </ul>
</aside>
