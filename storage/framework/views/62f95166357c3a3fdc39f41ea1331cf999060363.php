<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="grid">
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('movie_detail_guest', ['movie_id' => $movie->movie_id])); ?>">
                <div class="playing_movie">
                    <img src="<?php echo e(Storage::url($movie->movie_url)); ?>">
                    <p class="movie_title"><?php echo e($movie->movie_name); ?></p>
                    <div class="bottom_section">
                        <div class="rating"><?php echo e($movie->dimension); ?></div>
                        <div class="rating"><?php echo e($movie->age); ?></div>
                    </div>
                </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/home_guest.blade.php ENDPATH**/ ?>