

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">Product List</span>
    <a class="crud-btns" href="">
        <i class="bi bi-plus-circle"></i>
    </a>
</div>
<!-- C/C Supplier List-->
<table class="table table-bordered mt-2 text-center align-middle">
    <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Supplier Name</th>
            <th class="">Supplier Email</th>
            <th class="">Status</th>
            <th class="">Action</th>
        </tr>
    </thead>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.master.admin_shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/shop/shop_admin.blade.php ENDPATH**/ ?>