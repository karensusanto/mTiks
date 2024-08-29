<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="top-section">Edit Movie Info
    </div>
    <form action="<?php echo e(route('edit_movie_info')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PATCH"); ?>
        <img src="<?php echo e(Storage::url($movie->movie_url)); ?>" style="width: 204px;height: 263px;margin-bottom: 10px;"/>
        <input type="hidden" name="movie_id" value="<?php echo e($movie->movie_id); ?>">
        <p>Movie Name:</p>
        <input type="text" name="movie_name"  value="<?php echo e($movie->movie_name); ?>">
        <p>Duration:</p>
        <input type="text" name="duration"  value="<?php echo e($movie->duration); ?>">
        <p>Dimension:</p>
        <input type="text" name="dimension"  value="<?php echo e($movie->dimension); ?>">
        <p>Age:</p>
        <input type="text" name="age"  value="<?php echo e($movie->age); ?>">
        <p>Synopsis:</p>
        <textarea type="text" name="synopsis" ><?php echo e($movie->synopsis); ?></textarea>
        <p>Producer:</p>
        <input type="text" name="producer" value="<?php echo e($movie->producer); ?>">
        <p>Director:</p>
        <input type="text" name="director"  value="<?php echo e($movie->director); ?>">
        <p>Writer:</p>
        <input type="text" name="writer"  value="<?php echo e($movie->writer); ?>">
        <p>Cast:</p>
        <input type="text" name="casts"  value="<?php echo e($movie->casts); ?>">
        <button type="submit" class="button-submit">Edit</button>
    </form>
    <form action="<?php echo e(route('delete_relationship_by_movie')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <input type="hidden" name="movie_id" value="<?php echo e($movie->movie_id); ?>">
        <button type="submit" class="button-submit">Delete</button>
    </form>
    <?php if($errors->any()): ?>
        <p style="color:red; font-size:14px; margin-top:10px">
            <?php echo e($errors->first()); ?>

        </p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/edit_movie_info.blade.php ENDPATH**/ ?>