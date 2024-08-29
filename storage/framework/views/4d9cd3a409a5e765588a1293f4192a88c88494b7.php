<?php $__env->startSection('content'); ?>

<div class="main-content">
    <div class="top-section">Tickets</div>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="theatre-box">
        <p>Ticket id : <?php echo e($d->ticket_id); ?></p>
        <p>Buyer id : <?php echo e($member_id); ?></p>
        <p>Movie : <?php echo e($d->movie_name); ?></p>
        <p>Theatre : <?php echo e($d->theatre_name); ?></p>
        <p>Movie time : <?php echo e($d->movie_time); ?></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/tickets.blade.php ENDPATH**/ ?>