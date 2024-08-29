
<div class="navbar-left">
    <img src="<?php echo e(asset('images/CinemaXXI.png')); ?>">
    <ul>
            <a href="<?php echo e(route('home')); ?>"><li>Now Playing</li></a>
            <a href="<?php echo e(route('theatres')); ?>"><li>Theatres</li></a>
    </ul>
</div>

<?php echo $__env->yieldContent('search-bar'); ?>

<div class="navbar-right">
        <ul>
                <?php if(Auth::check() && Auth::user()->user_role=='member'): ?>
                    <a href="<?php echo e(route('tickets',['member_id'=> Auth::user()->users_id])); ?>"><li>Tickets</li></a>
                    <a href="<?php echo e(route('logout')); ?>"><li>Logout</li></a>
                <?php elseif(Auth::check() && Auth::user()->user_role=='admin'): ?>
                    <a href="<?php echo e(route('logout')); ?>"><li>Logout</li></a>
                <?php else: ?>
                    <a href="<?php echo e(route('login_page')); ?>"><li>Login</li></a>
                <?php endif; ?>
        </ul>
    </div>
<?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/navbar.blade.php ENDPATH**/ ?>