<?php $__env->startSection('content'); ?>
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <!-- Profile start -->
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.patientLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- Profile end -->
        <!-- MidSection start -->
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <h6 class="p-2 mb-1 d-flex justify-content-between bg-blue-grey custom-border-radius">
                    <span>Tooth <?php echo e($treatment_info->treatment_plans); ?></span>
                    <span>Tooth no: <?php echo e($treatment_info->tooth_no); ?></span>
                </h6>







                <!-- treatmentplans start -->

                <form action="<?php echo e(route('treatment_steps',[$doctor_info->id,$patient->id,$treatment_info->id])); ?>" method="post" class="row mx-0">
                    <?php echo csrf_field(); ?>
                    <div class="col-6">
                        <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">
                            Tooth Information
                        </h6>
                        <div class="treatment-box text-center   p-2">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="container">
                                        <div class="treatment-info mb-2 ">
                                            <img class="tooth-img" src="<?php echo e(asset('assets/img/teeths/all_tooth/'.$tooth_info->img)); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    
                                    <h4>Tooth No: <?php echo e($treatment_info->tooth_no); ?></h4>
                                    <h6><?php echo e($tooth_info->Tooth_name); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12">
                                <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">
                                    History
                                </h6>
                                <div class="treatment-box p-2">
                                    <p class="fw-bold m-0 ms-1">CC : <span class="fw-normal"><?php echo e($treatment_info->chife_complaints); ?></span></p>
                                    <p class="fw-bold m-0 ms-1">CF : <span class="fw-normal"><?php echo e($treatment_info->clinical_findings); ?></span></p>
                                    <p class="fw-bold m-0 ms-1 mb-2">Investigation : <span class="fw-normal"><?php echo e($treatment_info->investigation); ?></span></p>
                                </div>
                            </div>
                            <div class="col-12 mt-1">
                                <h6 class="p-2 d-flex justify-content-between bg-blue-grey custom-border-radius">
                                    <span>Status</span>
                                    <?php if($treatment_info->status == 2): ?>
                                    <span>Done</span>
                                    <?php elseif($treatment_info->status == 1): ?>
                                    <span>Progress</span>
                                    <?php else: ?>
                                    <span>Not Done</span>
                                    <?php endif; ?>
                                </h6>

                                    <div class="treatment-box p-2">
                                        <?php if($treatment_info->status == 2): ?>
                                            <h5 class="mb-0">This Treatment Is Done.</h5>
                                        <?php else: ?>
                                        <label for="t_status" class="form-label">Enter Treatment Status</label>
                                        <select class="form-select" aria-label="Default select example" id="t_status" name="t_status">
                                            <option <?php echo e(($treatment_info->status) == '0' ? 'selected' : ''); ?> value="0">Not
                                                Done
                                            </option>
                                            <option <?php echo e(($treatment_info->status) == '1' ? 'selected' : ''); ?> value="1">
                                                Progress
                                            </option>
                                            <option <?php echo e(($treatment_info->status) == '2' ? 'selected' : ''); ?> value="2">
                                                Done
                                            </option>
                                        </select>
                                        <span class="text-danger"><?php $__errorArgs = ['t_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                        <?php endif; ?>
                                        <!-- <div id="emailHelp" class="form-text text-danger">*Before Submit Please Select Treatment Status</div> -->
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-1">
                        <h6 class="d-flex justify-content-center bg-blue-grey custom-border-radius p-2">OT Notes</h6>
                        <div class="treatment-box p-2">
                            <div class="p-2">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="12" name="steps"
                                          placeholder="Enter OT Notes"></textarea>
                                <span class="text-danger"><?php $__errorArgs = ['steps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php if($treatment_info->status != 2): ?>
                    <div class="col-12 mt-1">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-blue-grey px-3 mt-2">Submit</button>
                        </div>
                    </div>
                    <?php endif; ?>
                </form>

                <!-- treatmentplans end -->
            </div>
        </div>
        <!-- MidSection end -->

        <!-- Prescription,Ad & Events start -->
        <div class="col-md-3 page-home">
            <?php echo $__env->make('doctor.include.patientRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<!-- <style>
    .image_view {
        width: 100px;
        height: 100px;
        cursor: pointer;
    }

    #FullImageView {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        text-align: center;
        z-index: 1200;
    }

    #FullImage {
        padding: 24px;
        max-width: 98%;
        max-height: 98%;
    }

    #CloseBtn {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
    }
</style> -->

<!-- <div id="FullImageView">
    <img id="FullImage" />
    <span id="CloseBtn" onclick="FullViewClose()">&times;</span>
</div> -->
<!-- Admin Notice,Ad & Events end -->
<?php if($treatment_info->status != 2): ?>
<div class="modal fade " id="Next_Appointment_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Next Appointment
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('next_appointment')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="modal-body">
                        <input type="hidden" id="appointment_id" value="<?php echo e($appointment_id->id); ?>" name="appointment_id">
                        <input type="hidden" id="d_id" value="<?php echo e($doctor_info->id); ?>" name="d_id">
                        <input type="hidden" id="p_id" value="<?php echo e($patient->id); ?>" name="p_id">

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" value="<?php echo e($patient->name); ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Appointment</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<?php endif; ?>




<!-- Modal For Report_Add Add -->
<div class="modal fade " id="Report_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Report
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#exampleModal_1" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('report',[$doctor_info->id,$patient->id,$treatment_info->id])); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <label for="formFile" class="form-label text-dark">Drop Image</label>
                            <input class="form-control" name="report_image" type="file" id="formFile">
                            <span class="text-danger"><?php $__errorArgs = ['report_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_1">Discard
                        </button>
                        <button type="submit" class="btn btn-sm btn btn-sm btn-outline-blue-grey">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Report -->
<div class="modal fade " id="del-Report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Report
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('report_delete')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This Report information?</h5>
                    </div>
                    <input type="hidden" id="del-Report-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close
                        </button>
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

<!-- Modal For OT Notes update -->
<div class="modal fade " id="Ot_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit OT Notes
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <form action="<?php echo e(route('update_ot')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" id="ot_notes_id" name="ot_notes_id" />
                <div class="modal-body px-0">
                    <div class="p-2">
                        <textarea class="form-control" id="ot_note_form" rows="12" name="u_steps"></textarea>
                        <span class="text-danger"><?php $__errorArgs = ['u_steps'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update</button>
                </div>
            </form>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Report -->
<div class="modal fade " id="del-ot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete OT Note
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Investigation" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_ot')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This OT information?</h5>
                    </div>
                    <input type="text" id="del-OT-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Investigation">Close
                        </button>
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
        <?php if(Session::has('invalidReport') && count($errors) > 0): ?>
            $('#Report_Add').modal('show');
        <?php endif; ?>
        $(document).on('click', '.delete-report', function() {
            var deleteReportId = $(this).val();
            // $("#Treatment_Plans").modal('hide');
            // alert(deleteTPId);
            $("#del-Report").modal('show');
            $('#del-Report-id').val(deleteReportId);
        });

        $(document).on('click', '.t_steps_editbtn', function() {
            var ot_id = $(this).val();
            let url = "<?php echo e(route('ot_notes',[':ot_id'])); ?>";
            url = url.replace(':ot_id',ot_id);
            // $("#Treatment_Cost").modal('hide');
            // alert(ot_id);
            $("#Ot_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response.ts1);
                    let t = response.ts;

                    $('#ot_notes_id').val(ot_id);
                    $("textarea#ot_note_form").val(t);
                    // $('#chember-add').val(response.ci.chember_address);
                }
            });
        });

        <?php if(Session::has('invalidUpdate') && count($errors) > 0): ?>
            // $('#Ot_Update').modal('show');
            $('.t_steps_editbtn').click();
        <?php endif; ?>

        $(document).on('click', '.delete-ot_note', function() {
            var deleteOtId = $(this).val();
            // $("#Treatment_Plans").modal('hide');
            // alert(deleteOtId);
            $("#del-ot").modal('show');
            $('#del-OT-id').val(deleteOtId);
        });
    });
</script>

<!-- <script>
    function FullView(ImgLink) {
        document.getElementById("FullImage").src = ImgLink;
        document.getElementById("FullImageView").style.display = "block";
    }

    function FullViewClose() {
        document.getElementById("FullImageView").style.display = "none";
    }
</script> -->
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/doctor/treatmentplans.blade.php ENDPATH**/ ?>