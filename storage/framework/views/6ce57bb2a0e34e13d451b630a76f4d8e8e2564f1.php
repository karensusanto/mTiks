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
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>
<body>
        <div class="navbar-left">
            <img src="<?php echo e(asset('images/CinemaXXI.png')); ?>">
            <ul>
                <a href="<?php echo e(route('home_page')); ?>"><li>Now Playing</li></a>
                <a href="<?php echo e(route('theatre')); ?>"><li>Theatres</li></a>
            </ul>
        </div>

        <div class="navbar-right">
            <ul>
                <a href="<?php echo e(route('login')); ?> "><li>Login</li></a>
                <a href="<?php echo e(route('register')); ?> "><li>Register</li></a>
            </ul>
        </div>
</body>
</html>
<?php /**PATH D:\Karen kuliah\aslab\post training\laravel\mTiks\resources\views/guest_navbar.blade.php ENDPATH**/ ?>