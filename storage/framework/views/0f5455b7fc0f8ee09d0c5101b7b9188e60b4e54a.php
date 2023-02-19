<div class="info-box-patient-col mb-3 pb-1">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Medical History</h6>
    <div class="Patient-info">
        <div class="row">
            <div class="col-12 text-start">BP :<?php echo e($patient->bp_high); ?> / <?php echo e($patient->bp_low); ?></div>
            <div class="col-12 text-start">Heart Disease: <?php echo e($patient->Heart_Disease); ?></div>
            <div class="col-12 text-start">Diabetic: <?php echo e($patient->Diabetic); ?></div>
            <div class="col-12 text-start">Helpatics: <?php echo e($patient->Helpatics); ?></div>
            <div class="col-12 text-start">Bleeding disorder: <?php echo e($patient->Bleeding_disorder); ?></div>
            <div class="col-12 text-start">Allergy: <?php echo e($patient->Allergy); ?></div>

            <?php if($patient->gender == "Male"): ?>
            <div class="col-12 text-start"> </div>
            <?php else: ?>
            <div class="col-12 text-start">Pregnant/Lactating: <?php echo e($patient->Pregnant); ?></div>
            <?php endif; ?>
            <div class="col-12 text-start">Other: <?php echo e($patient->other); ?></div>
            <!-- <button type="button" class="btn btn-secondary btn-sm">Small button</button> -->
            <!--  a tag trigger modal -->
            <?php if(Request::routeIs('view_patient')): ?>
            <div class="mt-2 d-flex justify-content-center">
                <a href="" class="btns btn-outline-blue-grey mt-2 text-center" data-bs-toggle="modal" data-bs-target="#UpdatePatient">
                    Add/Edit
                </a>
            </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php if(Request::routeIs('view_patient')): ?>
<div class="info-box-col mb-3 pb-1">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Previous Prescription</h6>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php $__empty_1 = true; $__currentLoopData = $v_prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v_prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="accordion-item mb-0">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo<?php echo e($key +1); ?>" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <p class="me-5"><?php echo e($key + 1); ?>.</p>
                    <p class="ms-5"><?php echo e($v_prescription->date); ?></p>
                </button>
            </h2>
            <div id="flush-collapseTwo<?php echo e($key +1); ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <h4>Drug List From Prescription</h4>
                    <?php
                    $ds = $v_prescription->drug_id_list;
                    $ds = explode(',',$ds);
                    $drug_infos = \App\Models\drugs::find($ds);
                    ?>
                    <ol class="mt-2">
                        <?php $__currentLoopData = $drug_infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <p>
                                <?php echo e($drug_info->drug_name); ?>

                            </p>
                            <p>
                                <?php echo e($drug_info->drug_time); ?> [ <?php echo e($drug_info->duration); ?> day(s) ] <?php echo e($drug_info->meal_time); ?>

                            </p>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ol>
                    <a href="<?php echo e(route('view_prescription',[$doctor_info->id,$patient->id])); ?>" class="btn rounded-pill btn-outline-blue-grey">View</a>

                    <a href="<?php echo e(route('send_mail',[$doctor_info->id,$patient->id])); ?>" class="btn rounded-pill btn-outline-blue-grey">Send Mail</a>

                    <button class="btn rounded-pill btn-outline-blue-grey delete-Prescription" data-prescription-name="<?php echo e($v_prescription->date); ?>" value="<?php echo e($v_prescription->id); ?>" style="font-size:14px ;">
                        Delete
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    No Prescription Added Yet.
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="" class="btn btn-black">View</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="info-box-col mb-3 d-flex flex-column">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Ad</h6>

    <!-- <button type="button" class="btn btn-outline-info text-dark mt-2 mb-2 btn-lg  ">Post</button> -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseOne">
                    Notice #1
                </button>
            </h2>
            <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, officiis. Praesentium commodi molestias voluptatibus culpa.</div>
            </div>
        </div>
    </div>
</div>
<div class="shadow  rounded">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Cost</h6>

    <div class="d-flex justify-content-between align-items-center   p-2">

        <!-- <h4>Treatment Cost</h4>
                        <div>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost_Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost">
                            <i class="bi bi-card-list"></i>
                        </a>
                        </div> -->
        <h6 class="estimated-cost-title">Estimated Cost</h6>
        <div>
            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Estimated_Cost">
                <i class="bi bi-card-list"></i>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if(Request::routeIs('treatments')): ?>
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Previous OT Notes</h4>
    <?php if($t_steps->isNotEmpty()): ?>
    <?php $__currentLoopData = $t_steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo e($key +1); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                    <p><?php echo e($key + 1); ?>. <?php echo e($t->date); ?></p>
                </button>
            </h2>
            <div id="flush-collapseOne<?php echo e($key +1); ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="mb-2">
                        <li><span>Steps:</span> <?php echo e($t->steps); ?></li>
                    </ul>
                    <button class="btn crud-btns t_steps_editbtn" href="" value="<?php echo e($t->id); ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns delete-ot_note" href="#" value="<?php echo e($t->id); ?>">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Previous Treatment OT Note #1
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ol>
                        <li>There was no previous steps information.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Report</h4>
    <div class="d-flex flex-row justify-content-around align-items-center py-1">
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Report_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
        <h6>Remaining: <?php echo e($total_report); ?></h6>
    </div>
    <hr class="m-0">
    <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="accordion-item mb-0">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed d-flex py-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <p class="me-5">Reports</p>
                </button>
            </h2>

            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <?php if($reports->isNotEmpty()): ?>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Images</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($key + 1); ?></td>
                                <td>
                                    <img src="<?php echo e(url('public/uploads/report/'.$report->image)); ?>" onclick="FullView(this.src)">
                                </td>
                                <td>
                                    <button class="btn crud-btns delete-report" href="#" value="<?php echo e($report->id); ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <h6>There was no report of this patient.</h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Post to Furums</h4>
    <button type="button" class="btn btn-outline-info text-dark mt-2 mb-2 btn-lg  ">Post</button>
</div>

<?php endif; ?>

<?php if(Request::routeIs('view_patient')): ?>
<!-- Modal -->
<div class="modal fade " id="UpdatePatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content ">
            <!--bg-opacity-50-->
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">
                    Edit Patient Info.
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->

            <div class="modal-body">
                <form action="<?php echo e(route('update_patient',$patient->id)); ?>" method="post">
                    <?php echo method_field('PUT'); ?>
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <!-- 1 -->
                        <div class="mb-2 col-6">
                            <label for="exampleInputEmail1" class="form-label ">BP</label>
                            <div class="d-flex">
                                <input type="number" name="bp_high" class="form-control custom-form-control me-3" value="<?php echo e($patient->bp_high); ?>">
                                <h3 class="m-0">/</h3>
                                <input type="number" name="bp_low" class="form-control custom-form-control ms-3" value="<?php echo e($patient->bp_low); ?>">
                                <span class="text-danger"><?php $__errorArgs = ['bp_high'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                <span class="text-danger"><?php $__errorArgs = ['bp_low'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                            </div>

                            <!-- <div class="form-text"></div> -->
                        </div>
                        <!-- 2 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label  ">Bleeding discorder</label>
                            <select class="form-select" name="Bleeding_disorder" aria-label="Heart Disease" value="<?php echo e($patient->Bleeding_disorder); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Bleeding_disorder) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Bleeding_disorder) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Bleeding_disorder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- 3 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label  ">Heart Disease</label>
                            <select class="form-select" name="Heart_Disease" aria-label="Heart Disease" value="<?php echo e($patient->Heart_Disease); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Heart_Disease) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Heart_Disease) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Heart_Disease'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- 4 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Allergy</label>
                            <select class="form-select" name="Allergy" aria-label="Heart Disease" value="<?php echo e($patient->Allergy); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Allergy) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Allergy) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Allergy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- 5 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Diabetic</label>
                            <select class="form-select" name="Diabetic" aria-label="Heart Disease" value="<?php echo e($patient->Diabetic); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Diabetic) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Diabetic) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Diabetic'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- 6 -->

                        <?php if($patient->gender != "Male"): ?>
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Pregnant/Lactating</label>
                            <select class="form-select" name="Pregnant" aria-label="Heart Disease" value="<?php echo e($patient->Pregnant); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Pregnant) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Pregnant) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Pregnant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <?php endif; ?>
                        <!-- 7 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Helpatics</label>
                            <select class="form-select" name="Helpatics" aria-label="Heart Disease" value="<?php echo e($patient->Helpatics); ?>">
                                <option selected></option>
                                <option <?php echo e(($patient->Helpatics) == 'yes' ? 'selected' : ''); ?> value="yes">Yes</option>
                                <option <?php echo e(($patient->Helpatics) == 'no' ? 'selected' : ''); ?> value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger"><?php $__errorArgs = ['Helpatics'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                        </div>
                        <!-- 8 -->
                        <div class="mb-2 col-6">
                            <label for="exampleInputEmail1" class="form-label ">Other</label>
                            <input type="text" name="other" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo e($patient->other); ?>">
                            <span class="text-danger"><?php $__errorArgs = ['other'];
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
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-blue-grey ">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Modal Body end -->
            <!-- Modal Footer -->

            <!-- Modal Footer end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna1602\resources\views/doctor/include/patientRightSide.blade.php ENDPATH**/ ?>