<?php $__env->startSection('search-bar'); ?>
<div class="search-section">
    <form action="<?php echo e(route('home')); ?>" method="GET">
        <?php echo csrf_field(); ?>
        <input type="text" name="search" placeholder="Search...">
        <button type="submit"><img src="images\search.svg" alt=""></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <p style="color:red; margin-top:10px">
        <?php echo e($errors->first()); ?>

    </p>
<?php endif; ?>
<div class="main-content">
    <img src="images\iklan1.png">
    <div class="grid">
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('movie_detail', ['movie_id' => $movie->movie_id])); ?>">
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
    <?php if(Auth::check() && Auth::user()->user_role == 'admin'): ?>
        <a href="<?php echo e(route('add_new_movie_page')); ?>"><div class="add-movie">+</div></a>
    <?php endif; ?>
</div>
<div class="pagination">
    <?php echo $movies->links(); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/home.blade.php ENDPATH**/ ?>