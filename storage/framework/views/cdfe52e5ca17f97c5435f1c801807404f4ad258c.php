<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap&family=Orbitron&display=swap" rel="stylesheet">
    <script src="<?php echo e(asset('javascript/index.js')); ?>" defer></script>
    <script src="<?php echo e(asset('javascript/post.js')); ?>" defer></script>
    <script src="<?php echo e(asset('javascript/edit_post.js')); ?>" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<body>
    <nav>
        <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>

    <?php echo $__env->yieldContent('content'); ?>

</body>
</html>
<?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/main.blade.php ENDPATH**/ ?>