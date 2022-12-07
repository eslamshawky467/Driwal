
<div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
<aside class="app-sidebar" style="background-color: #161616">
        <li><a class="app-menu__item " href=" <?php echo e(route('dashboard')); ?>"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label"><?php echo e(trans('admin.overview')); ?></span></a></li>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.Admins')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('admins.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.create')); ?></span></a>
              </li>
              <li>
                <a class="treeview-item" href="<?php echo e(route('admins.index')); ?>"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label"><?php echo e(trans('admin.index')); ?></span></a>
              </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label"><?php echo e(trans('admin.Users')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('clints.create')); ?>"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.createuser')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('clints.index')); ?>"><i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label"><?php echo e(trans('admin.Users')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('client_accounts.index')); ?>"><i class="app-menu__icon fa fa-credit-card"></i> <span class="app-menu__label"><?php echo e(trans('admin.client_account')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label"><?php echo e(trans('admin.company')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li><a class="treeview-item" href="<?php echo e(route('Companies.create')); ?>">
                    <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.createcompany')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('Companies.index')); ?>"><i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label"><?php echo e(trans('admin.companies')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview  " style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label"><?php echo e(trans('driver.banners')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('banner.create')); ?>"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('driver.createbanner')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('banner.index')); ?>"><i class="app-menu__icon fa fa-picture-o"></i> <span class="app-menu__label"><?php echo e(trans('driver.banners')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview  " style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label"><?php echo e(trans('admin.settings')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('contact_us.index')); ?>"><i class="app-menu__icon fa fa-connectdevelop"></i> <span class="app-menu__label"><?php echo e(trans('admin.contact')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('about_us')); ?>"><i class="app-menu__icon fa fa-info"></i> <span class="app-menu__label"><?php echo e(trans('admin.about')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('qa.index')); ?>"><i class="app-menu__icon fa fa-question"></i> <span class="app-menu__label"><?php echo e(trans('admin.FAQ')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-universal-access"></i><span class="app-menu__label"><?php echo e(trans('admin.driver')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('driver.create')); ?>"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.createdriver')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('driver.index')); ?>"><i class="app-menu__icon fa fa-universal-access"></i> <span class="app-menu__label"><?php echo e(trans('admin.drivers')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('driversaccounts.index')); ?>"><i class="app-menu__icon fa fa-credit-card"></i> <span class="app-menu__label"><?php echo e(trans('admin.driversaccounts')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label"><?php echo e(trans('admin.package')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('packages.create')); ?>"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.createpackage')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('packages.index')); ?>"><i class="app-menu__icon fa fa-archive"></i> <span class="app-menu__label"><?php echo e(trans('admin.packages')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('packages.search')); ?>"><i class="app-menu__icon fa fa-search"></i> <span class="app-menu__label"><?php echo e(trans('admin.search')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-map-marker"></i><span class="app-menu__label"><?php echo e(trans('admin.zone')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
                <li>
                    <a class="treeview-item" href="<?php echo e(route('zones.create')); ?>"><i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label"><?php echo e(trans('admin.createzone')); ?></span></a>
                </li>
                <li>
                    <a class="treeview-item" href="<?php echo e(route('zones.index')); ?>"><i class="app-menu__icon fa fa-map-marker"></i> <span class="app-menu__label"><?php echo e(trans('admin.zones')); ?></span></a>
                </li>
            </ul>
        </li>
    </ul>
    <li>
        <a class="treeview-item" href="<?php echo e(route('map.index')); ?>">
        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
            <?php echo e(trans('map index')); ?></a></li>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.Companies')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="<?php echo e(route('ad.index')); ?>">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.ad')); ?></a>
                        </li>
                       <li><a class="treeview-item" href="<?php echo e(route('ad.index')); ?>">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.ad')); ?></a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.Companies')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="<?php echo e(route('requests.index')); ?>">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.requests')); ?></a>
                        </li>

                    </ul>
                </li>
            </ul>
            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.car_types')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="<?php echo e(route('car_type.create')); ?>">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.create_car_types')); ?></a>
                        </li>
                       <li><a class="treeview-item" href="<?php echo e(route('car_type.index')); ?>">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.index_car_types')); ?></a>
                        </li>

                    </ul>
                </li>
            </ul>

            <ul class="app-menu" >
                <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.car_models')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
                    <ul class="treeview-menu"style="background-color: #161616">
                      <li><a class="treeview-item" href="<?php echo e(route('car_model.create')); ?>">
                        <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.create_car_models')); ?></a>
                        </li>
                       <li><a class="treeview-item" href="<?php echo e(route('car_model.index')); ?>">
                        <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                            <?php echo e(trans('admin.index_car_models')); ?></a>
                        </li>

                    </ul>
                </li>
            </ul>
</aside>
<?php /**PATH C:\laragon\www\Driwal-mona_register_driver\resources\views/layouts/admin/_aside.blade.php ENDPATH**/ ?>