<?php $__env->startSection('content'); ?>
<h3>Hello From Admin Dashboard</h3>
    <p><?php echo e(auth()->user()->email); ?></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
