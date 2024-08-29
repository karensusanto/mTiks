<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="top-section">Edit Theatre Info
    </div>
    <form action="<?php echo e(route('edit_theatre_info')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PATCH"); ?>
        <p>Theatre Name:</p>
        <input type="hidden" name="theatre_id" value="<?php echo e($theatre->theatre_id); ?>">
        <input type="text" name="theatre_name"  value="<?php echo e($theatre->theatre_name); ?>">
        <button type="submit" class="button-submit">Edit</button>
    </form>
    <form action="<?php echo e(route('delete_relationship_by_theatre')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <input type="hidden" name="theatre_id" value="<?php echo e($theatre->theatre_id); ?>">
        <button type="submit" class="button-submit">Delete</button>
    </form>
    <?php if($errors->any()): ?>
        <p style="color:red; font-size:14px; margin-top:10px">
            <?php echo e($errors->first()); ?>

        </p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/edit_theatre.blade.php ENDPATH**/ ?>