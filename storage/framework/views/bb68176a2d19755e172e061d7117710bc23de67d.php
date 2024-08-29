<?php $__env->startSection('search-bar'); ?>
<div class="search-section">
    <form action="<?php echo e(route('theatres')); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"><img src="images\search.svg" alt=""></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-content">

    <?php if(Auth::check() && Auth::user()->user_role == 'admin'): ?>
        <?php $__currentLoopData = $theatres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('edit_theatre_info_page',['theatre_id'=>$t->theatre_id])); ?>" class="theatre-list"><div class="theatre-box"><?php echo e($t->theatre_name); ?></div></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="bottom">
            <a href="<?php echo e(route('add_theatre_page')); ?>"><div class="add-theatre">+</div></a>
        </div>

    <?php else: ?>
        <?php $__currentLoopData = $theatres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="theatre-box"><?php echo e($t->theatre_name); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="pagination">
        <?php echo $theatres->links(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/theatre.blade.php ENDPATH**/ ?>