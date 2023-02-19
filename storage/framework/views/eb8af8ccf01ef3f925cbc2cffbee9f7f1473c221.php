

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">Chief Complaint List</span>
    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#chife_Complaint_Add">
        <i class="bi bi-plus-circle"></i>
    </a>
</div>
<!-- C/C Chief Complaint List-->
<table class="table table-bordered mt-2 text-center align-middle">
    <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Chief Complaints</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $lc_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lcc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="p-0"><?php echo e($key+1); ?></td>
            <td class="p-0"><?php echo e($lcc->name); ?></td>
            <td class="d-flex justify-content-around p-0">
                <button type="button" class="btn crud-btns CC_editbtn" href="" value="<?php echo e($lcc->id); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn crud-btns delete-cc" href="#" value="<?php echo e($lcc->id); ?>">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($lc_cs ->links()); ?>

<!--C/C Chief Complaint list end -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<!-- Modal For C/C Chief Complaint Add -->
<div class="modal fade " id="chife_Complaint_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('chife_complaint')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control custom-form-control" list="list" placeholder="Enter New Cheif Complaint" name="cc_name">
                        </div>
                        <input type="hidden" name="cc_status" id="" value="0">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For C/C Chief Complaint update -->
<div class="modal fade " id="chife_Complaint_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Cheif Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_chife_complaint')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="CCId" name="c_c_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="c_c_name" placeholder="Enter New Chief Complaint" name="cc_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Delete C/C Chief Complaint -->
<div class="modal fade " id="del-CC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete C/C Chief Complaint
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_chife_complaint')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-cc-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>

<script>
    $(document).ready(function() {
        // script for C/C Chief Complaint
        $(document).on('click', '.CC_editbtn', function() {
            var cc_id = $(this).val();
            var url = "<?php echo e(route('edit_chife_complaint',[':cc_id'])); ?>";
            url = url.replace(':cc_id', cc_id);
            // alert(edit);
            $("#chife_Complaint_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.cc.name);
                    $('#CCId').val(cc_id);
                    $('#c_c_name').val(response.cc.name);
                }
            });
        });

        $(document).on('click', '.delete-cc', function() {
            var deleteCCId = $(this).val();
            // alert(deleteCCId);
            $("#del-CC").modal('show');
            $('#del-cc-id').val(deleteCCId);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/admin/chief_complaint_list.blade.php ENDPATH**/ ?>