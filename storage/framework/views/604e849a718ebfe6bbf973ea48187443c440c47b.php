<?php $__env->startPush('page-css'); ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?php $__env->stopPush(); ?>
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
            <?php echo $__env->make('include.docLeftSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec">
                <h6 class="p-2 mb-3 d-flex justify-content-center bg-blue-grey custom-border-radius">
                    Profile Settings</h6>
                <div class="mx-3">
                    <ul class="nav nav-tabs doctor_profile_setting" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="barcode-tab" data-bs-toggle="tab" data-bs-target="#barcode-tab-pane" type="button" role="tab" aria-controls="barcode-tab-pane" aria-selected="true">QR Code</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="treatment-cost-tab" data-bs-toggle="tab" data-bs-target="#treatment-cost-tab-pane" type="button" role="tab" aria-controls="treatment-cost-tab-pane" aria-selected="false">Treatment Cost</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chamber-info-tab" data-bs-toggle="tab" data-bs-target="#chamber-info-tab-pane" type="button" role="tab" aria-controls="chamber-info-tab-pane" aria-selected="false">Chamber Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chamber-schedule-tab" data-bs-toggle="tab" data-bs-target="#chamber-schedule-tab-pane" type="button" role="tab" aria-controls="chamber-schedule-tab-pane" aria-selected="false">Chamber Schedule</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="favourite-tab" data-bs-toggle="tab" data-bs-target="#favourite-tab-pane" type="button" role="tab" aria-controls="favourite-tab-pane" aria-selected="false">Favourite</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="barcode-tab-pane" role="tabpanel" aria-labelledby="barcode-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>QR Code</h4>
                                <button class="crud-btns border-0 bg-transparent <?php echo e($doctor_info->bar_image != null ? 'd-none':''); ?>" data-bs-toggle="modal" data-bs-target="#AddBarcode">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <table class="table table-bordered mt-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="">QR Code Image</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($doctor_info->bar_image != null): ?>
                                    <tr>
                                        <th>
                                            <img src="<?php echo e(asset('public/uploads/Barcode/'.$doctor_info->bar_image)); ?>" alt="Barcode" width="200">

                                        </th>
                                        <th>
                                            <button class="btn crud-btns" data-bs-toggle="modal" data-bs-target="#UpdateBarcode">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="treatment-cost-tab-pane" role="tabpanel" aria-labelledby="treatment-cost-tab" tabindex="0">
                            <div div class="d-flex justify-content-evenly mt-2">
                                <h4>Treatment Cost</h4>
                                <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                                <!-- <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost">
                                            <i class="bi bi-card-list"></i>
                                        </a> -->
                            </div>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <table class="table table-bordered mt-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="">Serial No</th>
                                        <th class="">Treatment Plans</th>
                                        <th class="">Cost</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $t_p_costs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$t_p_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($t_p_cost->name); ?></td>
                                        <td><?php echo e($t_p_cost->price); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn crud-btns TP_Cost_editbtn" href="" value="<?php echo e($t_p_cost->id); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn crud-btns delete-tp_Cost" href="#" value="<?php echo e($t_p_cost->id); ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="chamber-info-tab-pane" role="tabpanel" aria-labelledby="chamber-info-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>Chamber List</h4>
                                <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Chember_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <table class="table table-bordered mt-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="">Serial No</th>
                                        <th class="">Chamber Name</th>
                                        <th class="">Chamber Address</th>
                                        <th class="">Chamber Number</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $chembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($chember->chember_name); ?></td>
                                        <td><?php echo e($chember->chember_address); ?></td>
                                        <td><?php echo e($chember->chember_number); ?></td>
                                        <td class="d-flex justify-content-around">
                                            <button class="btn crud-btns chember_editbtn" href="" value="<?php echo e($chember->id); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn crud-btns delete-Chember" href="#" value="<?php echo e($chember->id); ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <!-- </div> -->
                        </div>
                        <div class="tab-pane fade" id="chamber-schedule-tab-pane" role="tabpanel" aria-labelledby="chamber-schedule-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>Chamber Schedule List</h4>
                                <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Schedule_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <table class="table table-bordered mt-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="">Serial No</th>
                                        <th class="">Chamber Name</th>
                                        <th class="">Week's Name</th>
                                        <th class="">Day Time</th>
                                        <th class="">Evening Time</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key + 1); ?></td>
                                        <td><?php echo e($schedule->chember_name); ?></td>
                                        <td><?php echo e($schedule->week_name); ?></td>
                                        <td><?php echo e($schedule->day_time); ?></td>
                                        <td><?php echo e($schedule->evening_time); ?></td>
                                        <td class="d-flex justify-content-around">
                                            
                                            <button class="btn crud-btns delete-Chember" href="#" value="<?php echo e($schedule->id); ?>">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="favourite-tab-pane" role="tabpanel" aria-labelledby="favourite-tab" tabindex="0">
                            <div class="d-flex justify-content-evenly mt-2">
                                <h4>Favourite List</h4>
                                <button class="crud-btns border-0 bg-transparent <?php echo e($fav != null ? 'd-none':''); ?>" href="" data-bs-toggle="modal" data-bs-target="#Favourite_Add">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                            <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                            <?php endif; ?>
                            <?php if(Session::has('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(Session::get('fail')); ?></div>
                            <?php endif; ?>
                            <table class="table table-bordered mt-4 text-center">
                                <thead>
                                    <tr>
                                        <th class="">Cheif Complaint</th>
                                        <th class="">Clinical Findings</th>
                                        <th class="">Investigation</th>
                                        <th class="">Treatment Plans</th>
                                        <th class="">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($fav)): ?>
                                    <tr>
                                        <td><?php echo e($fav->fav_cc); ?></td>
                                        <td><?php echo e($fav->fav_cf); ?></td>
                                        <td><?php echo e($fav->fav_investigation); ?></td>
                                        <td><?php echo e($fav->fav_tp); ?></td>
                                        <td>
                                            <button class="btn crud-btns fav_editbtn" value="<?php echo e($fav->id); ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 page-home">
            <?php echo $__env->make('include.docRightSide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>

<!-- Admin Notice,Ad & Events end -->

<!-- Modal for Barcode Add -->
<div class="modal fade " id="AddBarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add QR Code Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('add_barcode')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />

                    <div class="mb-3">
                        <input type="file" class="form-control" name="barcode">
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
<!-- Modal for end Barcode Add -->

<!-- Modal for Barcode Update -->
<div class="modal fade " id="UpdateBarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Update QR Code Image
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_barcode')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />

                    <div class="mb-3">
                        <input type="file" class="form-control" name="u_barcode">
                    </div>
                    <div class="mb-3">
                        <h5>Previous QR Code</h5>
                        <img src="<?php echo e(asset('uploads/Barcode/'.$doctor_info->bar_image)); ?>" alt="Barcode" width="200">
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
<!-- Modal for end Barcode Update -->

<!-- Modal For T/P Treatment Cost Add -->
<div class="modal fade " id="Treatment_Cost_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="<?php echo e(route('treatment_cost')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="tp_name">
                            <option value=""></option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" list="list" placeholder="Enter Cost" name="tp_price">
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

<!-- Modal For T/P Treatment Cost update -->
<div class="modal fade " id="Treatment_Cost_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Treatment Cost
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_treatment_cost')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="TPCostId" name="tp_cost_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="tp_cost_name" placeholder="Enter New Clinical Finding" name="tp_cost_name">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="tp_cost" placeholder="Enter Cost" name="tp_cost">
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

<!-- Modal For Delete T/P Treatment Cost -->
<div class="modal fade " id="del-Cost-TP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Treatment Cost
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_treatment_cost')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-TP-cost-id" name="deletingId">
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

<!-- Modal For Chamber Add -->
<div class="modal fade " id="Chember_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('doctor_chember')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <input class="form-control" list="list" placeholder="Chember Name" name="chember_name">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" list="list" placeholder="Chember Address" name="chember_address">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" list="list" placeholder="Chember Contact Number" name="chember_number">
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
<!-- Modal For Chamber update -->
<div class="modal fade " id="Chember_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Edit Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_chember')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <input type="hidden" id="Chember_id" name="chember_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="chember_name" name="chember_name">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="chember-add" name="chember_address">
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="chember-num" name="chember_number">
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

<!-- Modal For Delete Chamber -->
<div class="modal fade " id="del-chember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Delete Chamber Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('delete_chember')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This information?</h5>
                    </div>
                    <input type="hidden" id="del-Chember_id" name="deletingId">
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


<!-- Modal For Chamber  Schedule Add -->
<div class="modal fade " id="Schedule_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Chamber Schedule Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('chember_schedule')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <!-- <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>"/> -->
                    <div class="mb-3">
                        <label for="chem_name" class="form-label">Select Chamber Name</label>
                        <select class="form-select" aria-label="Default select example" name="chem_name" id="chem_name">
                            <?php $__currentLoopData = $chembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chember): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($chember->id); ?>"><?php echo e($chember->chember_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Day Time</th>
                                <th>Evening Time</th>
                                <th><button type="button" name="add" id="add-btn" class="btn btn-sm btn-success"><i class="bi bi-plus-circle"></i></button></th>
                            </tr>
                        </thead>
                        <tbody id="dynamicAddRemove">
                            <!-- <tr>  
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="weekName[0][title]">
                                        <option value="Saturday">Saturday</option>
                                        <option value="Sunday">Sunday</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                        
                                    </select>
                                </td>  
                                <td>
                                    <input type="text" name="moreDays[0][title]" placeholder="Enter title" class="form-control" />
                                </td>  
                                <td>
                                    <input type="text" name="moreEvening[0][title]" placeholder="Enter title" class="form-control" />
                                </td>  
                                <td>
                                    <button type="button" class="btn btn-danger remove-tr"><i class="bi bi-dash-circle"></i></button>
                                </td>  
                            </tr> -->
                        </tbody>
                    </table>

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

<!-- Modal For Favourite Add -->
<div class="modal fade " id="Favourite_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Add Favourite Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('add_favourite')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="d_id" value="<?php echo e($doctor_info->id); ?>" />
                    <div class="mb-3">
                        <label for="c_c" class="form-label">Select C/C Cheif Complaint</label>
                        <select class="form-control custom-form-control multi" name="c_c[]" aria-label="Default select example" multiple style="width:100%;" id="c_c">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="c_f" class="form-label">Select C/F Clinical Findings</label>
                        <select class="form-control custom-form-control multi" name="c_f[]" aria-label="Default select example" multiple style="width:100%;" id="c_f">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="investigation" class="form-label">Select Investigation</label>
                        <select class="form-control custom-form-control multi" name="investigation[]" aria-label="Default select example" multiple style="width:100%;" id="investigation">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="X-ray"><?php echo e($investigation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="t_p" class="form-label">Select T/P Treatment Plans</label>
                        <select class="form-control custom-form-control multi" name="t_p[]" aria-label="Default select example" multiple style="width:100%;" id="t_p">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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

<!-- Modal For Favourite Update -->
<div class="modal fade " id="Favourite_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Update Favourite Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="<?php echo e(route('update_favourite')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <input type="hidden" name="fav_id" id="fav_id" value="" />
                    <div class="mb-3">
                        <label for="uc_c" class="form-label">Select C/C Cheif Complaint</label>
                        <select class="form-control custom-form-control multi2" name="uc_c[]" aria-label="Default select example" multiple style="width:100%;" id="uc_c" value="">
                            <?php $__currentLoopData = $c_cs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_c -> name); ?>"><?php echo e($c_c -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="uc_f" class="form-label">Select C/F Clinical Findings</label>
                        <select class="form-control custom-form-control multi2" name="uc_f[]" aria-label="Default select example" multiple style="width:100%;" id="uc_f">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $c_fs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c_f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($c_f -> name); ?>"><?php echo e($c_f -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="u_investigation" class="form-label">Select Investigation</label>
                        <select class="form-control custom-form-control multi2" name="u_investigation[]" aria-label="Default select example" multiple style="width:100%;" id="u_investigation">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $investigations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $investigation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($investigation->name); ?>"><?php echo e($investigation->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ut_p" class="form-label">Select T/P Treatment Plans</label>
                        <select class="form-control custom-form-control multi2" name="ut_p[]" aria-label="Default select example" multiple style="width:100%;" id="ut_p">
                            <option value="">Nothing To Select</option>
                            <?php $__currentLoopData = $t_ps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t_p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t_p -> name); ?>"><?php echo e($t_p -> name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // $(".multi").select2(2);
        $(".multi").select2({
            dropdownParent: $("#Favourite_Add"),
            maximumSelectionLength: 5
        });
        $(".multi2").select2({
            dropdownParent: $("#Favourite_Update"),
            maximumSelectionLength: 5
        });

        // script for Chember

        $(document).on('click', '.chember_editbtn', function() {
            var chember_id = $(this).val();
            // $("#Treatment_Cost").modal('hide');
            // alert(chember_id);
            $("#Chember_Update").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_chamber/" + chember_id,
                success: function(response) {
                    console.log(response.ci);
                    $('#Chember_id').val(chember_id);
                    $('#chember_name').val(response.ci.chember_name);
                    $('#chember-add').val(response.ci.chember_address);
                    $('#chember-num').val(response.ci.chember_number);
                }
            });
        });

        $(document).on('click', '.delete-Chember', function() {
            var deleteChemberId = $(this).val();
            // $("#Treatment_Cost").modal('hide');
            // alert(deleteTPCostId);
            $("#del-chember").modal('show');
            $('#del-Chember_id').val(deleteChemberId);
        });

        // script for Faverite

        $(document).on('click', '.fav_editbtn', function() {
            var fav_id = $(this).val();
            // alert(fav_id);
            $("#Favourite_Update").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_favourite/" + fav_id,
                success: function(response) {
                    // console.log(response.fav);
                    $('#fav_id').val(fav_id);
                    $('#uc_c').val(response.fav_cc);
                    $('#uc_f').val(response.fav_cf);
                    $('#u_investigation').val(response.fav_investigation);
                    $('#ut_p').val(response.fav_tp);
                }
            });
        });

        // script for T/P Treatment Costs

        $(document).on('click', '.TP_Cost_editbtn', function() {
            var tp_Cost_id = $(this).val();
            $("#Treatment_Cost").modal('hide');
            // alert(tp_Cost_id);
            $("#Treatment_Cost_Update").modal('show');
            $.ajax({
                type: "GET",
                url: "/edit_treatment_cost/" + tp_Cost_id,
                success: function(response) {
                    // console.log(response);
                    $('#TPCostId').val(tp_Cost_id);
                    $('#tp_cost_name').val(response.tp_cost.name);
                    $('#tp_cost').val(response.tp_cost.price);
                }
            });
        });

        $(document).on('click', '.delete-tp_Cost', function() {
            var deleteTPCostId = $(this).val();
            $("#Treatment_Cost").modal('hide');
            // alert(deleteTPCostId);
            $("#del-Cost-TP").modal('show');
            $('#del-TP-cost-id').val(deleteTPCostId);
        });
    });
</script>

<script type="text/javascript">
    var i = 0;
    $("#add-btn").click(function() {
        ++i;
        $("#dynamicAddRemove").append('\
        <tr>\
            <td>\
                <select class="form-select" aria-label="Default select example" name="weekName[' + i + ']">\
                    <option value="Saturday">Saturday</option>\
                    <option value="Sunday">Sunday</option>\
                    <option value="Monday">Monday</option>\
                    <option value="Tuesday">Tuesday</option>\
                    <option value="Wednesday">Wednesday</option>\
                    <option value="Thursday">Thursday</option>\
                    <option value="Friday">Friday</option>\
                </select>\
            </td>  \
            <td>\
                <input type="time" name="moreDays[' + i + ']" placeholder="Enter title" class="form-control" />\
            </td>\
            <td>\
                <input type="time" name="moreEvening[' + i + ']" placeholder="Enter title" class="form-control" />\
            </td>\
            <td>\
                <button type="button" class="btn btn-danger remove-tr"><i class="bi bi-dash-circle"></i></button>\
            </td>\
        </tr>\
    ');
    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/doctor_profile_setting.blade.php ENDPATH**/ ?>