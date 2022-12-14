<!-- Navbar-->
<header class="app-header" style="background-color: #BB000E"><a class="app-header__logo" style="font-family: 'Cairo', 'sans-serif';background-color: #BB000E" href="<?php echo e(route('dashboard')); ?>">  <?php echo e(trans('admin.Vali')); ?></a>

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">


        <li class="dropdown" id="notifications">


            <ul class="app-notification dropdown-menu dropdown-menu-right">

                <div class="app-notification__content">


                    <li>
                        <a class="app-notification__item" href="#">
                                <span class="app-notification__icon">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                        <i class="fa fa-address-book fa-stack-1x fa-inverse"></i>
                                    </span>
                                </span>
                            <div>
                                <p class="app-notification__message">Notification title</p>
                                <p class="app-notification__meta">2 mins ago</p>
                            </div>
                        </a>
                    </li>

                </div>

                <li class="app-notification__footer"><a href="#"><?php echo app('translator')->get('site.all'); ?> <?php echo app('translator')->get('notifications.notifications'); ?></a></li>
            </ul>
        </li>

        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-language"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a rel="alternate" hreflang="<?php echo e($localeCode); ?>" class="dropdown-item" href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                            <?php echo e($properties['native']); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>

        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-tasks"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a  class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="app-menu__icon fa fa-user"></i><?php echo e(trans('admin.Profile')); ?></a></li>
                <li>

                        <?php if(auth('client')->check()): ?>
                            <form method="GET" action="<?php echo e(route('logout','client')); ?> ">
                                <?php else: ?>
                                    <form method="GET" action="<?php echo e(route('logout','web')); ?>"><?php endif; ?>
                                        <?php echo csrf_field(); ?>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"> <i class="fa fa-sign-out fa-lg"></i><?php echo e(trans('admin.logout')); ?></a>
                                    </form>

                </li>
            </ul>
        </li>

    </ul>
</header>
<?php /**PATH C:\laragon\www\Draiwal\resources\views/layouts/admin/_header.blade.php ENDPATH**/ ?>