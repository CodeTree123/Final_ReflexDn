<?php $__env->startSection('content'); ?>

<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>

<?php $__env->startPush('page-css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>

<!-- body -->
<!-- body part 1 -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <!-- body part 1 end-->
        <!-- body part 2 -->

        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4>Appointment List</h4>
                    <button class="btn btn-outline-blue-grey crud-btns Appointment" value="" data-bs-toggle="modal" data-bs-target="#Appointment_form">
                        <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                        Set Appointment
                    </button>
                </div>
                <?php if(Session::has('fail')): ?>
                <div class="d-flex justify-content-between align-items-center alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(Session::get('fail')); ?>

                </div>
                <?php endif; ?>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <?php $__currentLoopData = $date_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($date_list >= Carbon\Carbon::now()->format('d/M/Y')): ?>
                <div class="m-3">
                    <h5><?php echo e($date_list); ?></h5>
                    <hr>
                    <div class="row">
                        <?php $__currentLoopData = $appointment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($date_list == Carbon\Carbon::parse($a->date)->format('d/M/Y')): ?>
                        <div class="col-3 my-2 Appointment-details blue-grey-border-thin">
                            <div class="p-2 d-flex align-items-center justify-content-around">
                                <div class="Appointment-Patient-img1">
                                    <?php if($a->image == null): ?>
                                    <img src="<?php echo e(asset('assets/img/profile.png')); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo e(url('public/uploads/patient/'.$a->image)); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <button class="btn btn-sm crud-btns app_editbtn" href="" value="<?php echo e($a->id); ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-sm crud-btns delete-appointment" href="#" value="<?php echo e($a->id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="text-center">
                                <p><?php echo e($a->name); ?></p>
                                <p><?php echo e($a->time); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <!-- body part 2 end -->
        <!-- body part 3 -->

        <!-- Admin Notice,Ad & Events start -->
        <div class="col-md-3 page-home">

            <div class="info-box-col mb-3">
                <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- body part 3 end -->

        </div>
    </div>
    <!-- body end-->

    <!-- Modal For Appointment -->
    <div class="modal fade " id="Appointment_form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Add Appointment
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('appointment')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" id="d_id" value="<?php echo e($doctor_info->id); ?>" name="d_id">
                            <input type="hidden" id="p_id" value="" name="p_id">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <select class="form-control custom-form-control multi" id="phone" name="" aria-label="Default select example" style="width:100%;">
                                    <option value="">Nothing To Select</option>
                                    <?php $__currentLoopData = $patient_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t_p->mobile); ?>"><?php echo e($t_p->mobile); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" min="<?php echo e(date('Y-m-d')); ?>" max="<?php echo e(\Carbon\Carbon::now()->addDays(5)->format('Y-m-d')); ?>">
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
    <!-- Modal end -->
    <!-- Modal For Edit Appointment -->
    <div class="modal fade " id="Appointment_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Edit Clinical Finding
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('update_appointment')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <input type="hidden" id="appointment_id" value="" name="appointment_id">
                            <div class="mb-3">
                                <label for="e_phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="e_phone" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="e_name" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="e_date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="e_date" name="date">
                            </div>
                            <div class="mb-3">
                                <label for="e_time" class="form-label">Time</label>
                                <input type="time" class="form-control" id="e_time" name="time">
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

    <!-- Modal For Delete Appointment -->
    <div class="modal fade " id="del-Appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Modal Header & Close btn -->
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Delete Appointment Information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal Header & Close btn end -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="<?php echo e(route('delete_appointment')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <div class="mb-3 text-center">
                            <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                        </div>
                        <input type="hidden" id="del-Appointment-id" name="deletingId">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".multi").select2({
                dropdownParent: $("#Appointment_form")
            });

            $('#phone').change(function() {
                var mobile = $(this).val();
                var d_id = $('#d_id').val();
                var url = "<?php echo e(route('action',[':d_id',':mobile'])); ?>";
                url = url.replace(':d_id',d_id);
                url = url.replace(':mobile',mobile);
                console.log(url);
                //  alert(d_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    // url: "/action/" + d_id + "/" + mobile,
                    success: function(response) {
                        console.log(response.p_info);
                        $('#p_id').val(response.p_info.id)
                        // $('#patient_id').val(response.p_info.patient_id);
                        $('#name').val(response.p_info.name);
                        // $('#phone').val(response.p_info.mobile);
                    }
                });

            });

            $(document).on('click', '.app_editbtn', function() {
                var app_id = $(this).val();
                // $("#Treatment_Cost").modal('hide');
                // alert(app_id);
                $("#Appointment_edit").modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit_appointment/" + app_id,
                    success: function(response) {
                        // console.log(response.f_date);
                        $('#appointment_id').val(app_id);
                        $('#e_phone').val(response.app.mobile);
                        $('#e_name').val(response.app.name);
                        $('#e_date').val(response.f_date);
                        $('#e_time').val(response.f_time);
                    }
                });
            });
            $(document).on('click', '.delete-appointment', function() {
                var deleteDoctorId = $(this).val();
                // alert(deleteCCId);
                $("#del-Appointment").modal('show');
                $('#del-Appointment-id').val(deleteDoctorId);
            });
        });
    </script>
    <?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/doctor/appointment.blade.php ENDPATH**/ ?>