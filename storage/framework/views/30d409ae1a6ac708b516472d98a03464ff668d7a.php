<?php $__env->startPush('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset ('assets/css/bs-stepper.css')); ?>">
<style>
    .form-check-input:checked {
        background-color: #1c374f !important;
        border-color: #1c374f !important;
    }

    .form-check-input:focus {
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(205 209 203 / 62%) !important
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<!-- main start -->
<div class="container-fluid">
    <!-- <div class="float-end">
    <a class="btn btn-danger text-center  d-flex align-items-center" href="<?php echo e(route('logout')); ?>" style="height: 30px; ">
            <i class="fa-solid fa-power-off fa-xl "></i>
    </a>
</div> -->
    <div class="row justify-content-center align-items-center">

        <div class="col-lg-10">
            <form action="<?php echo e(route('login_update_doctor',$doctor_id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo method_field('PUT'); ?>
                <?php echo csrf_field(); ?>
                <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
                <h4 class="mb-3 fw-normal text-center">Add Your Information</h4>


                <!-- <div class="form-floating">
            <input type="text" name="BMDC" class="form-control mb-2" id="bmdcID" placeholder="BMDC Registration No.">
            <label for="bmdcID">BMDC Registration No.</label>
        </div>
        <div class="form-floating">
            <input type="text" name="chember_name" class="form-control mb-2" id="chamberName" placeholder="chamberName">
            <label for="chamberName">Chamber Name</label>
        </div>
        <div class="form-floating">
            <input type="text" name="chember_add" class="form-control mb-2" id="chamberAddress" placeholder="chamberAddress">
            <label for="chamberAddress">Chamber Address</label>
        </div>


        <button class="w-100 btn btn-lg btn-outline-dark mb-2" type="submit">Sign Up</button>
            <p>----------------------------------------------------------------------------------------------------------------------------------------------</p> -->
                <div class="container flex-grow-1 flex-shrink-0">
                    <div class="bg-white shadow-sm">
                        <!-- <h3>Linear stepper</h3> -->
                        <div id="stepper1" class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#test-l-1">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger1" aria-controls="test-l-1">
                                        <span class="bs-stepper-circle">1</span>
                                        <span class="bs-stepper-label">Personal Information</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-2">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger2" aria-controls="test-l-2">
                                        <span class="bs-stepper-circle">2</span>
                                        <span class="bs-stepper-label">Academic Information</span>
                                    </button>
                                </div>
                                <div class="bs-stepper-line"></div>
                                <div class="step" data-target="#test-l-3">
                                    <button type="button" class="step-trigger" role="tab" id="stepper1trigger3" aria-controls="test-l-3">
                                        <span class="bs-stepper-circle">3</span>
                                        <span class="bs-stepper-label">Professional Information</span>
                                    </button>
                                </div>
                            </div>
                            <div class="bs-stepper-content">

                                <form onSubmit="return false">

                                    <!-- Personal Information Step -->
                                    <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating ">
                                                    <input type="number" name="phone" class="form-control mb-2" id="floatingInput" placeholder="Name" value="<?php echo e(old('phone')); ?>">
                                                    <label for="floatingInput">Mobile Number</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="number" name="BMDC" class="form-control mb-2" id="BMDC" placeholder="BMDC" value="<?php echo e(old('BMDC')); ?>">
                                                    <label for="BMDC">BMDC</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['BMDC'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="number" name="nid" class="form-control mb-2" id="nid" placeholder="NID" value="<?php echo e(old('nid')); ?>">
                                                    <label for="nid">NID</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['nid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" name="dob" class="form-control mb-2" id="dob" value="<?php echo e(old('dob')); ?>" placeholder="DD/MM/YYYY">
                                                    <label for="lName">Date of Birth<span class="text-danger">(DD/MM/YYYY *)</span></label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="rounded border" style="padding: 0.40rem 0.75rem;">
                                                    <p style="font-size: 12px;color: #8c8a8a;">Gender: </p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="m" value="Male">
                                                        <label class="form-check-label" for="m">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="f" value="Female">
                                                        <label class="form-check-label" for="f">Female</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <select class="form-select" aria-label="Select Blood Group" name="blood_group" value="<?php echo e(old('blood_group')); ?>" id="floatingSelect">
                                                        <option value="A+">A+</option>
                                                        <option value="A-">A-</option>
                                                        <option value="B+">B+</option>
                                                        <option value="B-">B-</option>
                                                        <option value="O+">O+</option>
                                                        <option value="O-">O-</option>
                                                        <option value="AB+">AB+</option>
                                                        <option value="AB-">AB-</option>
                                                    </select>
                                                    <label for="floatingSelect">Select Blood Group</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['blood_group'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="">
                                                    <label for="formFile" name="p_image" class="form-label text-dark">Drop your
                                                        image</label>
                                                    <input class="form-control" name="p_image" type="file" id="formFile">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="form-floating">
                                                    <input type="text" name="lName" class="form-control mb-2" id="lName" placeholder="Last Name">
                                                    <label for="lName">Last Name</label>
                                                </div> -->
                                        <a class="w-25 btn btn-lg btn-outline-dark my-3" onclick="stepper1.next()">Next</a>
                                    </div>

                                    <!-- Personal Information Step End-->


                                    <!-- Academic Information Step  -->
                                    <div id="test-l-2" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger2">
                                        <!-- <div class="rounded border p-2 my-2">
                                <p>Select Basic Degree: </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bDegree" id="mbbs" value="mbbs">
                                    <label class="form-check-label" for="mbbs">MBBS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="bDegree" id="bds" value="bds">
                                    <label class="form-check-label" for="bds">BDS</label>
                                </div>
                            </div> -->
                                        <!--<span class="text-danger"><?php $__errorArgs = ['bDegree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>-->

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating me-2">
                                                    <input type="text" name="mCollege" class="form-control mb-2 " id="mCollege" placeholder="Enter  Medical College" value="<?php echo e(old('mCollege')); ?>">
                                                    <label for="mCollege">Enter Medical College</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['mCollege'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating me-2">
                                                    <input type="text" name="batch" class="form-control mb-2" id="batch" placeholder="Batch" value="<?php echo e(old('batch')); ?>">
                                                    <label for="batch">Batch</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['batch'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating me-2">
                                                    <input type="text" name="d_session" class="form-control" id="session" placeholder="session" value="<?php echo e(old('session')); ?>">
                                                    <label for="session">Session</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['session'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" name="passing_year" class="form-control" id="passing_year" placeholder="passing_year" value="<?php echo e(old('passing_year')); ?>">
                                                    <label for="passing_year">Passing Year</label>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['passing_year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="">
                                                    <label for="bmdc_certificate_copy" class="form-label">Upload Your BMDC Certificate Copy <span class="text-danger">(PDF ONLY *)</span></label>
                                                    <input class="form-control form-control-lg" id="bmdc_certificate_copy" type="file" name="image1">
                                                </div>
                                            </div>
                                        </div>

                                        <a class="w-25 btn btn-lg btn-outline-dark my-3" onclick="stepper1.previous()">Previous</a>
                                        <a class="w-25 btn btn-lg btn-outline-dark my-3" onclick="stepper1.next()">Next</a>

                                    </div>
                                    <!-- Academic Information Step End -->


                                    <!-- Professional Information Step End-->

                                    <div id="test-l-3" role="tabpanel" class="bs-stepper-pane " aria-labelledby="stepper1trigger3">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" name="speciality" class="form-control" id="speciality" placeholder="Speciality" value="<?php echo e(old('speciality')); ?>">
                                                    <label for="speciality">Speciality</label>
                                                </div>
                                                <span class="text-danger mb-3"><?php $__errorArgs = ['speciality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-floating">
                                                    <input type="text" name="designation" class="form-control mb-2" id="designation" placeholder="Designation" value="<?php echo e(old('designation')); ?>">
                                                    <label for="designation">Designation</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="rounded border p-2 mt-2">
                                                    <p>Professional Degree: <span class="ms-3 fs-6 text-danger"><sup>(optional)</sup></span> </p>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="professional_degree" id="bcs" value="bcs">
                                                        <label class="form-check-label" for="bcs">BCS</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="professional_degree" id="post_grad" value="post_grad">
                                                        <label class="form-check-label" for="post_grad">Post Graduation Degree</label>
                                                    </div>
                                                </div>
                                                <span class="text-danger"><?php $__errorArgs = ['professional_degree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="">
                                                    <label for="professional_degree_certificate_copy" class="form-label">Upload Scan Copy of Your Post-Graduation Degree: <span class="ms-3 fs-6 text-danger"><sup>(optional)</sup></span></label>
                                                    <input class="form-control form-control-lg" id="professional_degree_certificate_copy" type="file" name="image2">
                                                </div>
                                            </div>

                                        </div>


                                        <a class="w-25 btn btn-lg btn-outline-dark my-3" onclick="stepper1.previous()">Previous</a>
                                        <button type="submit" class="w-25 btn btn-lg btn-outline-dark my-3" style="border-radius: 13px;">Submit</button>

                                    </div>
                                    <!-- Professional Information Step End-->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<script src="<?php echo e(asset ('assets/js/bs-stepper.js')); ?>"></script>
<script src="<?php echo e(asset ('public/assets/js/custom_stepper.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna1802\resources\views/doctor/login_profile_edit.blade.php ENDPATH**/ ?>