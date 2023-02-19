

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">Investigation List</span>
    <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Investigation_Add">
        <i class="bi bi-plus-circle"></i>
    </a>
</div>
<!-- Investigation List-->
<table class="table table-bordered mt-2 text-center align-middle">
    <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Investigations</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $investigation_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$investigation_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="p-0"><?php echo e($key+1); ?></td>
            <td class="p-0"><?php echo e($investigation_list->name); ?></td>
            <td class="d-flex justify-content-around p-0">
                <button class="btn crud-btns Investigation_editbtn" href="" value="<?php echo e($investigation_list->id); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn crud-btns delete-Investigation" href="#" value="<?php echo e($investigation_list->id); ?>">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

</table>
<!--Investigation list end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>
<!-- Modal For Investigation Add -->
<div class="modal fade " id="Investigation_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('investigation')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New Investigation" name="investigation_name">
                            <input type="hidden" name="investigation_status" id="investigation_status" value="0" readonly>
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
<!-- Modal For Investigation update -->
<div class="modal fade " id="Investigation_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_investigation')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="InvestigationId" name="investigation_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="Investigation_name" placeholder="Enter Investigation" name="investigation_name">
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
<!-- Modal For Delete Investigation -->
<div class="modal fade " id="del-Investigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Investigation
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_investigation')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-Investigation-id" name="deletingId">
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
        // script for Investigation

        $(document).on('click', '.Investigation_editbtn', function() {
            var Investigation_id = $(this).val();
            var url = "<?php echo e(route('edit_investigation',[':Investigation_id'])); ?>";
            url = url.replace(':Investigation_id', Investigation_id);
            // alert(Investigation_id);
            $("#Investigation_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#InvestigationId').val(Investigation_id);
                    $('#Investigation_name').val(response.inves.name);
                }
            });
        });

        $(document).on('click', '.delete-Investigation', function() {
            var deleteInvestigationId = $(this).val();
            // alert(deleteInvestigationId);
            $("#del-Investigation").modal('show');
            $('#del-Investigation-id').val(deleteInvestigationId);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/admin/investigation_list.blade.php ENDPATH**/ ?>