<?php $__env->startSection('content'); ?>
<div class="main-content">
    <img src="images\logo.png">
        <form action="<?php echo e(route('login')); ?>" method="POST" class="login-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="text" name="user_email" value="" placeholder="Email">
            <input type="password" name="password" placeholder="PIN/Password">
            <button type="submit" class="button-submit">Log In</button>
        </form>
        <?php if($errors->any()): ?>
                <p style="color:red; font-size:14px; margin-top:10px">
                    <?php echo e($errors->first()); ?>

                </p>
        <?php endif; ?>
    <hr>
        <p class="login-signup-text"><span>New Member, </span> <a href="<?php echo e(route('register_page')); ?>" style="color:black; text-decoration:none">Register M-Tix</a></p>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/login.blade.php ENDPATH**/ ?>