<div class="profile blue-grey-border-thin   ">
    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Patient's Profile</h6>
    <div class="complete">
        <div class="p-header">
            <!-- <img src="img/banner.jpg" class="cover"> -->
            <?php if($patient->image == null): ?>
            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="doctor-profile my-4">
            <?php else: ?>
            <img src="<?php echo e(url('public/uploads/patient/'.$patient->image)); ?>" class="doctor-profile my-4">
            <?php endif; ?>
            <!-- <i class="fa-solid fa-pen-to-square"></i> -->
            <h2 class="mb-2"><?php echo e($patient->name); ?></h2>
        </div>
        <div class="Patient-personal-info">
            <div class="row">
                <div class="col-12 text-start">Patient ID: <?php echo e($patient->id); ?></div>
                <div class="col-12 text-start">Age: <?php echo e($patient->age); ?></div>
                <div class="col-12 text-start ">Gender: <?php echo e($patient->gender); ?></div>
                <div class="col-12 text-start ">Blood Group: <?php echo e($patient->Blood_group); ?></div>
                <div class="col-12 text-start">Date of Birth: <?php echo e($patient->date); ?></div>


                <div class="col-12 text-start">Mobile: <?php echo e($patient->mobile); ?></div>

                <div class="col-12 text-start">Occupation: <?php echo e($patient->occupation); ?></div>
                <div class="col-12 text-start">Address: <?php echo e($patient->address); ?></div>
                <div class="col-12 text-start">Email: <?php echo e($patient->email); ?></div>

            </div>
        </div>

    </div>
</div>

<?php if(Route::current()->getName() == 'view_patient'): ?>
<div class="profile blue-grey-border-thin py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">

        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Treatment Plans</a> -->
        
        <a href="<?php echo e(route('doctor')); ?>" class="btns btn-outline-blue-grey my-2">Home</a>
        <a href="<?php echo e(route('prescription',[$doctor_info->id,$patient->id])); ?>" class="btns btn-outline-blue-grey my-2">Write a Prescription</a>
        <a href="<?php echo e(route('invoice',[$doctor_info->id,$patient->id])); ?>" class="btns btn-outline-blue-grey my-2">Billing</a>
    </div>

    <!-- <a href="">setting</a>
              <a href="" class="lgout-a">Logout</a> -->
</div>
<?php endif; ?>

<?php if(Route::current()->getName() == 'treatments'): ?>
<div class="profile  blue-grey-border-thin  py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">

        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">
                        Treatment Plans
                    </a> -->
        
        
        
        
        <?php if($treatment_info->status != 2): ?>
        <a href="" class="btns btn-outline-blue-grey my-2" data-bs-toggle="modal" data-bs-target="#Next_Appointment_form">
            Next Appointment
        </a>
        <?php else: ?>
        <a href="<?php echo e(route('view_patient',[$doctor_info->id,$patient->id])); ?>" class="btns btn-outline-blue-grey my-2">
            Patient Information
        </a>
        <?php endif; ?>
        <!-- <a href="<?php echo e(route('prescription',[$doctor_info->id,$patient->id])); ?>" class="btns  btn-outline-blue-grey my-2">
                            Prescription
                        </a>
                        <a href="<?php echo e(route('invoice',[$doctor_info->id,$patient->id])); ?>" class="btns btn-outline-blue-grey my-2">
                            Billing
                        </a> -->
    </div>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/include/patientLeftSide.blade.php ENDPATH**/ ?>