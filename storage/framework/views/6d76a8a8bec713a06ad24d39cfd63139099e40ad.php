<?php $__env->startSection('content'); ?>
<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                
                <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Patient List</h6>
                
                <table class="table table-bordered mt-2 text-center">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">name</th>
                            <th class="">mobile</th>
                            <th class="">Due</th>
                            <th class="" style="width:50px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $patient_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td><?php echo e($patient->name); ?></td>
                            <td><?php echo e($patient->mobile); ?></td>
                            <td>
                                <?php
                                $id = $patient->id;
                                $cost = \App\Models\treatment_info::where('p_id','=',$id)->sum('cost');
                                $paid = \App\Models\treatment_info::where('p_id','=',$id)->sum('paid');
                                $due = $cost - $paid;
                                echo $due;
                                ?>
                                <?php if($due>0): ?>
                                Taka
                                <?php endif; ?>
                            </td>
                            <td class="d-flex justify-content-around">
                                <button type="button" class="btn crud-btns Patient_viewbtn" href="" value="<?php echo e($patient->id); ?>">
                                    <i class="fa-solid fa-file-lines"></i>
                                </button>
                                <button type="button" class="btn crud-btns Patient_editbtn" href="" value="<?php echo e($patient->id); ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn crud-btns delete-patient" href="#" value="<?php echo e($patient->id); ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- <button class="btn crud-btns Patient_Edit" href="" value="<?php echo e($patient->id); ?>" >
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </button> -->
                                <!--  -->
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Admin Notice,Ad & Events start -->
        <div class="col-md-3 page-home">
            <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<!-- Admin Notice,Ad & Events end -->

<!-- main end -->

<style>
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
</style>

<div id="FullImageView">
    <img id="FullImage" />
    <span id="CloseBtn" onclick="FullViewClose()">&times;</span>
</div>

<!-- Modal For Patient VIEW -->
<div class="modal fade " id="Patient_View" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    View Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body" id="view_patient_info">

            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Patient update -->
<div class="modal fade " id="Patient_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header my-auto  align-items-center justify-content-between">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Edit Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_patient_list')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" name="doctor_id" value="<?php echo e($doctor_info->id); ?>" />
                    <input type="hidden" name="patient_id" id="patient_id" value="" />
                    <div class="modal-body py-0">
                        <div class="mb-2">
                            <label for="mobile"> Mobile No.</label>
                            <input type="number" name="mobile" class="form-control custom-form-control" placeholder="Mobile No" id="mobile" value="">
                        </div>

                        <div class="row">
                            <div class="col-9">
                                <div class="mb-2">
                                    <label for="name"> Name</label>
                                    <input type="name" name="name" id="name" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-2">
                                    <label for="age"> Age</label>
                                    <input type="number" name="age" id="age" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Age" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="gender"> Gender</label>
                                    <input type="text" name="gender" class="form-control custom-form-control" id="gender" aria-describedby="emailHelp" placeholder="Gender" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">

                                    <label for="Blood_group"> Blood Group</label>
                                    <input type="text" name="Blood_group" id="Blood_group" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blood Group" value="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label for="date"> Date</label>
                                    <input class="form-control custom-form-control" name="date" type="text" placeholder="Date of Birth" value="" id="date">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-2">
                                    <label for="occupation"> Occupation</label>
                                    <input type="text" class="form-control custom-form-control" name="occupation" id="occupation" placeholder="Occupation" value="">
                                </div>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="address"> Address</label>
                            <input type="address" class="form-control custom-form-control" name="address" placeholder="Address" value="" id="address">
                        </div>

                        <div class="">
                            <label for="email"> Email</label>
                            <input type="email" name="email" class="form-control custom-form-control" id="email" aria-describedby="emailHelp" placeholder="Email address" value="">
                        </div>


                        <div class="my-2">
                            <label for="formFile" name="image" class="form-label text-dark">
                                Drop your image <span class="text-danger" style="font-size:12px ;">*If You Want To Change Profile Picture</span>
                            </label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div id="img_show" class="mt-2">
                            <img src="" class="mt-2" style="width: 70px; height: 70px;">
                        </div>
                    </div>
                    <div class="modal-footer py-0">
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

<!-- Modal For Delete Patient -->
<div class="modal fade " id="del-Patient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_patient_list')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-patient-id" name="deletingId">
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

        $(document).on('click', '.Patient_viewbtn', function() {
            var Patient_id = $(this).val();
            // alert(Patient_id);
            $("#Patient_View").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_patient/" + Patient_id,
                success: function(response) {
                    // console.log(response.patient_infos);
                    $('#view_patient_info').html("");
                    $('#view_patient_info').append('\
                            <p>Name: <span>' + response.patient_infos.name + '</span></p>\
                            <p>Name: <span>' + response.patient_infos.age + '</span></p>\
                            <p>Email: <span>' + response.patient_infos.email + '</span></p>\
                            <p>Mobile: <span>' + response.patient_infos.mobile + '</span></p>\
                            <p>Gender: <span>' + response.patient_infos.gender + '</span></p>\
                            <p>Blood Group: <span>' + response.patient_infos.Blood_group + '</span></p>\
                            <p>Birth Date: <span>' + response.patient_infos.date + '</span></p>\
                            <p>Occupation: <span>' + response.patient_infos.occupation + '</span></p>\
                            <p>Address: <span>' + response.patient_infos.address + '</span></p>\
                            <p class="d-flex align-items-center">Profile Picture: \
                                <img class="image_view ms-5" src="/public/uploads/patient/' + response.patient_infos.image + '" onclick="FullView(this.src)" >\
                            </p>\
                        ');
                }
            });

        });

        $(document).on('click', '.Patient_editbtn', function() {
            var Patient_id = $(this).val();
            // alert(Patient_id);
            $("#Patient_Update").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_patient/" + Patient_id,
                success: function(response) {
                    // console.log(response.patient_infos);
                    $('#patient_id').val(Patient_id);
                    $('#mobile').val(response.patient_infos.mobile);
                    $('#name').val(response.patient_infos.name);
                    $('#age').val(response.patient_infos.age);
                    $('#gender').val(response.patient_infos.gender);
                    $('#Blood_group').val(response.patient_infos.Blood_group);
                    $('#date').val(response.patient_infos.date);
                    $('#occupation').val(response.patient_infos.occupation);
                    $('#address').val(response.patient_infos.address);
                    $('#email').val(response.patient_infos.email);
                    $('#img_show').html("");
                    $('#img_show').append('\
                        <p class="d-flex align-items-center">Profile Picture:\
                            <img class="image_view ms-5" src="/uploads/patient/' + response.patient_infos.image + '"> \
                         </p>\
                        ');
                }
            });
        });

        $(document).on('click', '.delete-patient', function() {
            var deletePatientId = $(this).val();
            // alert(deletePatientId);
            $("#del-Patient").modal('show');
            $('#del-patient-id').val(deletePatientId);
        });

    });
</script>

<script>
    function FullView(ImgLink) {
        document.getElementById("FullImage").src = ImgLink;
        document.getElementById("FullImageView").style.display = "block";
    }

    function FullViewClose() {
        document.getElementById("FullImageView").style.display = "none";
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna0902\resources\views/doctor/patient_list.blade.php ENDPATH**/ ?>