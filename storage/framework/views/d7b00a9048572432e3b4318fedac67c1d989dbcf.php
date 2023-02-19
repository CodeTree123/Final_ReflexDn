<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">My Information</span>
    <a class="crud-btns" href="">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
</div>
<div class="row">
    <div class="col-6">
        <p>Profile Picture:</p>
        <img src="<?php echo e(asset('public/uploads/shop/'.auth()->user()->p_image)); ?>" alt="" width="250px" height="250px">
    </div>
    <div class="col-6">
        <p>Name:<?php echo e(auth()->user()->fname." ".auth()->user()->lname); ?></p>
        <p>Email:<?php echo e(auth()->user()->email); ?></p>
        <p>Contact:<?php echo e(auth()->user()->phone); ?></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.master.admin_shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna0902\resources\views/shop/shop_admin/shop_admin_panel.blade.php ENDPATH**/ ?>