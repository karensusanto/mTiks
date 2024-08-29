<?php $__env->startSection('content'); ?>
<div class="main-content">
    <div class="top-section">
        <div class="age"><?php echo e($movie->age); ?></div>
        <div class="title"><?php echo e($movie->movie_name); ?></div>
    </div>
    <div class="middle-section">
        <img src="<?php echo e(Storage::url($movie->movie_url)); ?>">
        <div class="side-info">

            <div class="duration"><?php echo e($movie->duration); ?> Minutes</div>
            <div class="dimension"><?php echo e($movie->dimension); ?></div>
            <?php if(Auth::check()&&Auth::user()->user_role=='admin'): ?>
                <a href="<?php echo e(route('edit_movie_info_page',['movie_id' => $movie->movie_id])); ?>" class="button-submit">Edit</a>
            <?php elseif(Auth::check()&&Auth::user()->user_role=='member'): ?>
                <form action="<?php echo e(route('buy_ticket',['movie_id' => $movie->movie_id, 'user_id' => Auth::user()->users_id])); ?>" method="POST" ><?php echo csrf_field(); ?><button type="submit" class="buy-ticket" >BUY TICKET</button></form>
            <?php else: ?>
            <a href="<?php echo e(route('login_page')); ?>" class="buy-ticket">BUY TICKET</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="synopsis"><?php echo e($movie->synopsis); ?></div>
    <div class="judul-isi">
        <div class="judul">Producer</div>
        <p><?php echo e($movie->producer); ?></p>
    </div>
    <div class="judul-isi">
        <div class="judul">Director</div>
        <p><?php echo e($movie->director); ?></p>
    </div>
    <div class="judul-isi">
        <div class="judul">Writer</div>
        <p><?php echo e($movie->writer); ?></p>
    </div>
    <div class="judul-isi">
        <div class="judul">Cast</div>
        <p><?php echo e($movie->casts); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/movie_info.blade.php ENDPATH**/ ?>