<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="top-section">New Theatre
    </div>
    <form action="<?php echo e(route('add_theatre')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <p>Theatre Name:</p>
        <input type="text" name="theatre_name"  value="">
        <button type="submit" class="button-submit">Create Theatre</button>
    </form>
    <?php if($errors->any()): ?>
        <p style="color:red; font-size:14px; margin-top:10px">
            <?php echo e($errors->first()); ?>

        </p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/add_theatre_info.blade.php ENDPATH**/ ?>