<?php $__env->startSection('content'); ?>
<?php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            <?php echo $__env->make('doctor.include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <!-- main start -->
            <div class="blank-sec">
                <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">
                    Your Profile Information</h6>
                <div class="mx-3 mt-3">
                    <form action="<?php echo e(route('update.doctor',[$doctor_info->id])); ?>" method="post" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                        <!-- <h3 class="mb-3 fw-normal text-center">Edit Your Profile</h3> -->
                        <div class="d-flex justify-content-between mx-2">
                            <h6 class="mb-3 fw-normal">Your BMDC ID: <?php echo e($doctor_info->BMDC); ?></h6>
                            <h6 class="mb-3 fw-normal">Your ID:<?php echo e($doctor_info->id); ?></h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <input type="text" name="fname" class="form-control mb-2" id="floatingInput" value="<?php echo e($doctor_info->fname); ?>">
                                    <label for="floatingInput">First Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <input type="text" name="lname" class="form-control mb-2" id="floatingInput" value="<?php echo e($doctor_info->lname); ?>">
                                    <label for="floatingInput">Last Name</label>
                                </div>
                            </div>
                            <!-- <div class="form-floating">
                                <input type="text" name="BMDC" class="form-control mb-2" id="bmdcID" placeholder="BMDC Registration No.">
                                <label for="bmdcID">BMDC Registration No.</label>
                            </div> -->
                            <!-- <div class="form-floating">
                                <input type="text" name="chember_name" class="form-control mb-2" id="chamberName" placeholder="chamberName" value="<?php echo e($doctor_info->chember_name); ?>">
                                <label for="chamberName">Chamber Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="chember_add" class="form-control mb-2" id="chamberAddress" placeholder="chamberAddress" value="<?php echo e($doctor_info->chember_add); ?>">
                                <label for="chamberAddress">Chamber Address</label>
                            </div> -->
                            <div class="col-md-6">
                                <div class="form-floating ">
                                    <input type="number" name="phone" class="form-control mb-2" id="floatingInput" placeholder="Name" value="<?php echo e($doctor_info->phone); ?>">
                                    <label for="floatingInput">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="nid" class="form-control mb-2" id="nid" placeholder="NID" value="<?php echo e($doctor_info->nid); ?>">
                                    <label for="nid">NID</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="mCollege" class="form-control mb-2 " id="mCollege" placeholder="Enter  Medical College" value="<?php echo e($doctor_info->mCollege); ?>">
                                    <label for="mCollege">Enter Medical College</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="batch" class="form-control mb-2" id="batch" placeholder="Batch" value="<?php echo e($doctor_info->batch); ?>">
                                    <label for="batch">Batch</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="d_session" class="form-control mb-2" id="session" placeholder="session" value="<?php echo e($doctor_info->session); ?>">
                                    <label for="session">Session</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="passing_year" class="form-control mb-2" id="passing_year" placeholder="passing_year" value="<?php echo e($doctor_info->passing_year); ?>">
                                    <label for="passing_year">Passing Year</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="speciality" class="form-control mb-2" id="speciality" placeholder="Speciality" value="<?php echo e($doctor_info->speciality); ?>">
                                    <label for="speciality">Speciality</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="w-50">
                                        <label for="formFile" name="p_image" class="form-label text-dark">Drop your image</label>
                                        <input class="form-control" name="p_image" type="file" id="formFile">
                                    </div>
                                    <img src="<?php echo e(url('public/uploads/doctor/'.$doctor_info->p_image)); ?>" class="mx-auto" style="width: 70px; height: 70px; cursor: pointer;" onclick="FullView(this.src)">
                                </div>
                            </div>
                        </div>


                        <button class=" w-100 btn btn-lg btn-outline-dark mb-2" type="submit">Update</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 page-home">
            <?php echo $__env->make('doctor.include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna0902\resources\views/doctor/profile_edit.blade.php ENDPATH**/ ?>