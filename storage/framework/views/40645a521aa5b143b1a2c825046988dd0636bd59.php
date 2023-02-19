

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">Treatment Plans List</span>
    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Plan_Add">
        <i class="bi bi-plus-circle"></i>
    </a>
</div>
<!-- T/P Treatment Plans List-->
<table class="table table-bordered mt-2 text-center align-middle">
    <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Treatment Plans</th>
            <!-- <th class="">Cost</th> -->
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $lt_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$ltp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="p-0"><?php echo e($key+1); ?></td>
            <td class="p-0"><?php echo e($ltp->name); ?></td>
            <!-- <td><?php echo e($ltp->cost); ?></td> -->
            <td class="d-flex justify-content-around p-0">
                <button class="btn crud-btns TP_editbtn" value="<?php echo e($ltp->id); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn crud-btns delete-tp" value="<?php echo e($ltp->id); ?>">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<!--T/P Treatment Plans list end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
<!-- Modal For T/P Treatment Plans Add -->
<div class="modal fade " id="Treatment_Plan_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('treatment_plan')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="tp_status" id="" value="0">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Treatment Plan" name="tp_name">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter Cost" name="tp_cost">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For T/P Treatment Plans update -->
<div class="modal fade " id="Treatment_Plan_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Treatment Plan
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_treatment_plan')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="TPId" name="t_p_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_name" placeholder="Enter New Clinical Finding" name="tp_name">
                        </div>
                        <!-- <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="t_p_cost" placeholder="Enter Cost" name="tp_cost">
                        </div> -->
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
<!-- Modal For Delete T/P Treatment Plans -->
<div class="modal fade " id="del-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete T/P Treatment Plans
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_treatment_plan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-TP-id" name="deletingId">
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
        // script for T/P Treatment Plans update/edit

        $(document).on('click', '.TP_editbtn', function() {
            var tp_id = $(this).val();
            var url = "<?php echo e(route('edit_treatment_plan',[':tp_id'])); ?>";
            url = url.replace(':tp_id', tp_id);
            // alert(tp_id);
            $("#Treatment_Plan_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#TPId').val(tp_id);
                    $('#t_p_name').val(response.tp.name);
                    // $('#t_p_cost').val(response.tp.cost);
                }
            });
        });

        $(document).on('click', '.delete-tp', function() {
            var deleteTPId = $(this).val();
            // alert(deleteTPId);
            $("#del-TP").modal('show');
            $('#del-TP-id').val(deleteTPId);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/admin/treatment_plans_list.blade.php ENDPATH**/ ?>