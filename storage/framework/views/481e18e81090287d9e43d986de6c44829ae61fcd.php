<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="top-section">New Movie
    </div>
    <form action="<?php echo e(route('add_new_movie')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <img src="http://via.placeholder.com/300x400" style="width: 204px;height: 263px;margin-bottom: 10px;" id="edit-post-image" />
        <p>Movie Poster:</p>
        <input type="file" id="edit-post-file" name="image" />
        <input type="hidden" name="movie_id" value="">
        <p>Movie Name:</p>
        <input type="text" name="movie_name"  value="">
        <p>Duration:</p>
        <input type="text" name="duration"  value="">
        <p>Dimension:</p>
        <input type="text" name="dimension"  value="">
        <p>Age:</p>
        <input type="text" name="age"  value="">
        <p>Synopsis:</p>
        <textarea type="text" name="synopsis" ></textarea>
        <p>Producer:</p>
        <input type="text" name="producer" value="">
        <p>Director:</p>
        <input type="text" name="director"  value="">
        <p>Writer:</p>
        <input type="text" name="writer"  value="">
        <p>Cast:</p>
        <input type="text" name="casts"  value="">
        <button type="submit" class="button-submit">Create Movie</button>
    </form>
    <?php if($errors->any()): ?>
        <p style="color:red; font-size:14px; margin-top:10px">
            <?php echo e($errors->first()); ?>

        </p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/add_movie_info.blade.php ENDPATH**/ ?>