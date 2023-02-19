<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center align-items-center mb-3">
    <span class="fs-4">Edit Profile</span>
</div>
<form action="<?php echo e(route('supplier_update')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="mb-3">
        <div class="row">
            <input type="hidden" name="shop_id" value="<?php echo e(auth()->user()->id); ?>">
            <div class="col-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="s_fname" value="<?php echo e(auth()->user()->fname); ?>">
                <span class="text-danger"><?php $__errorArgs = ['s_fname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="col-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="s_lname" value="<?php echo e(auth()->user()->lname); ?>">
                <span class="text-danger"><?php $__errorArgs = ['s_lname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="col-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Shop Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="s_shopName" value="<?php echo e(auth()->user()->shop->shop); ?>">
                <span class="text-danger"><?php $__errorArgs = ['s_shopName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="col-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" name="s_phone" value="<?php echo e(auth()->user()->phone); ?>">
                <span class=" text-danger"><?php $__errorArgs = ['s_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="col-6 mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" name="s_image">
                <span class="text-danger"><?php $__errorArgs = ['s_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
            </div>
            <div class="col-6 mb-3">
                <img src="<?php echo e(asset('public/uploads/shop/'.auth()->user()->p_image)); ?>" alt="" width="200px">
            </div>
        </div>
        <input type="hidden" name="cf_status" id="" value="0">
    </div>
    <div class="text-center mb-2">
        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.master.admin_shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/shop/shop_admin/shop_admin_edit.blade.php ENDPATH**/ ?>