
<div class="app-sidebar__overlay" data-toggle="sidebar" ></div>
<aside class="app-sidebar" style="background-color: #161616">
    <li><a class="app-menu__item " href=" <?php echo e(route('dashboard')); ?>"><i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label"><?php echo e(trans('admin.overview')); ?></span></a></li>
    <ul class="app-menu" >
        <li class="treeview is-expanded" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label"><?php echo e(trans('admin.Admins')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('admins.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                      <?php echo e(trans('admin.create')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('admins.index')); ?>">
                <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                       <?php echo e(trans('admin.index')); ?></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label"><?php echo e(trans('admin.Users')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('clints.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.createuser')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('clints.index')); ?>">
                <i class="app-menu__icon fa fa-users"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.Users')); ?></a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label"><?php echo e(trans('admin.company')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('Companies.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.createcompany')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('Companies.index')); ?>">
                <i class="app-menu__icon fa fa-lock"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.companies')); ?></a>
                </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-universal-access"></i><span class="app-menu__label"><?php echo e(trans('admin.driver')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('driver.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.createdriver')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('driver.index')); ?>">
                <i class="app-menu__icon fa fa-universal-access"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.drivers')); ?></a>
                </li>
                <li><a class="treeview-item" href="<?php echo e(route('driversaccounts.index')); ?>">
                    <i class="app-menu__icon fa fa-credit-card"></i> <span class="app-menu__label">
                        <?php echo e(trans('admin.driversaccounts')); ?></a>
                    </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-archive"></i><span class="app-menu__label"><?php echo e(trans('admin.package')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('packages.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.createpackage')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('packages.index')); ?>">
                <i class="app-menu__icon fa fa-archive"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.packages')); ?></a>
                </li>
                <li><a class="treeview-item" href="<?php echo e(route('packages.search')); ?>">
                    <i class="app-menu__icon fa fa-search"></i> <span class="app-menu__label">
                        <?php echo e(trans('admin.search')); ?></a>
                    </li>
            </ul>
        </li>
    </ul>

    <ul class="app-menu" >
        <li class="treeview" style="background-color: #161616"><a class="app-menu__item" href=" " data-toggle="treeview"><i class="app-menu__icon fa fa-map-marker"></i><span class="app-menu__label"><?php echo e(trans('admin.zone')); ?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu"style="background-color: #161616">
              <li><a class="treeview-item" href="<?php echo e(route('zones.create')); ?>">
                <i class="app-menu__icon fa fa-plus"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.createzone')); ?></a>
                </li>
               <li><a class="treeview-item" href="<?php echo e(route('zones.index')); ?>">
                <i class="app-menu__icon fa fa-map-marker"></i> <span class="app-menu__label">
                    <?php echo e(trans('admin.zones')); ?></a>
                </li>
            </ul>
        </li>
    </ul>


</aside>
<?php /**PATH C:\laragon\www\Salm-mostafa_driwal_transaction_task\resources\views/layouts/admin/_aside.blade.php ENDPATH**/ ?>