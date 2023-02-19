<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <p><?php echo e(auth()->user()->id); ?></p>
    <a href="<?php echo e(route('logout')); ?>" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
        <!-- <i class="fa-solid fa-power-off fa-xl"></i> -->
        Logout
    </a>
</body>

</html><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/shop/shop.blade.php ENDPATH**/ ?>