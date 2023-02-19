

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center align-items-center mb-3">
    <span class="fs-4">Update Prodect</span>
</div>
<form action="<?php echo e(route('edit_shop_product',$pro->id)); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <div class="row mb-3">
        <div class="col-4">
            <div class="mb-2">
                <label for="cat" class="form-label">Select Category</label>
                <select class="form-select" aria-label="Default select example" id="cat" name="cat">
                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e($pro->cat_id == $cat->id ? ' selected':''); ?>><?php echo e($cat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php if($pro->subcat_id != null): ?>
            <div class="mb-2" id="subcat">
                <label for="sub_cat" class="form-label">Select Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_cat" name="sub_cat">
                    <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subcat->id); ?>" <?php echo e($pro->subcat_id == $subcat->id ? ' selected':''); ?>><?php echo e($subcat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php else: ?>
            <div class="mb-2" id="subcat_sec">
                <label for="sub_cat" class="form-label">Select Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_cat" name="sub_cat">

                </select>
            </div>
            <?php endif; ?>

            <?php if($pro->subsubcat_id != null): ?>
            <div class="mb-2" id="sub_subcat">
                <label for="sub_sub_cat" class="form-label">Select Sub Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat" name="sub_sub_cat">
                    <?php $__currentLoopData = $subsubcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subsubcat->id); ?>" <?php echo e($pro->subsubcat_id == $subsubcat->id ? ' selected':''); ?>><?php echo e($subsubcat->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php else: ?>
            <div class="mb-2" id="sub_subcat_sec">
                <label for="sub_sub_cat" class="form-label">Select Sub Sub Category</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat" name="sub_sub_cat">

                </select>
            </div>
            <?php endif; ?>

            <?php if($pro->subsubcat1_id != null): ?>
            <div class="mb-2" id="sub_subcat1">
                <label for="sub_sub_cat1" class="form-label">Select Sub Sub Category1</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat1" name="sub_sub_cat1">
                    <?php $__currentLoopData = $subsubcat1s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcat1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subsubcat1->id); ?>" <?php echo e($pro->subsubcat1_id == $subsubcat1->id ? ' selected':''); ?>><?php echo e($subsubcat1->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php else: ?>
            <div class="mb-2" id="sub_subcat1_sec">
                <label for="sub_sub_cat1" class="form-label">Select Sub Sub Category1</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat1" name="sub_sub_cat1">

                </select>
            </div>
            <?php endif; ?>

            <?php if($pro->subsubcat2_id != null): ?>
            <div class="mb-2" id="sub_subcat2">
                <label for="sub_sub_cat2" class="form-label">Select Sub Sub Category2</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat2" name="sub_sub_cat2">
                    <?php $__currentLoopData = $subsubcat2s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subsubcat2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($subsubcat2->id); ?>" <?php echo e($pro->subsubcat2_id == $subsubcat2->id ? ' selected':''); ?>><?php echo e($subsubcat2->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php else: ?>
            <div class="mb-2" id="sub_subcat2_sec">
                <label for="sub_sub_cat2" class="form-label">Select Sub Sub Category2</label>
                <select class="form-select" aria-label="Default select example" id="sub_sub_cat2" name="sub_sub_cat2">

                </select>
            </div>
            <?php endif; ?>
        </div>
        <div class="col-8">
            <input type="hidden" name="supplier_id" value="<?php echo e(auth()->user()->id); ?>">
            <div class="mb-2">
                <label for="pro_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="pro_name" aria-describedby="emailHelp" name="pro_name" value="<?php echo e($pro->pro_name); ?>">
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="mb-2">
                        <label for="pro_price" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="pro_price" aria-describedby="emailHelp" name="pro_price" value="<?php echo e($pro->pro_price); ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-2">
                        <label for="pro_img" class="form-label">Product Image</label>
                        <input class="form-control" type="file" id="pro_img" name="pro_img">
                    </div>
                </div>
                <div class="col-3">
                    <img src="<?php echo e(asset('public/uploads/shop_product/'.$pro->pro_img)); ?>" alt="" width="150px" height="150px">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mb-2">
        <a href="<?php echo e(route('shop_admin_product_list')); ?>" class="btn btn-sm btn-danger rounded">Cancel</a>
        <button type="submit" class="btn btn-sm btn-outline-blue-grey">Update Product</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-modals'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
<script>
    $(document).ready(function() {

        $('#subcat_sec').hide();
        $('#sub_subcat_sec').hide();
        $('#sub_subcat1_sec').hide();
        $('#sub_subcat2_sec').hide();

        $('#cat').on('change', function() {
            var cat_id = this.value;
            var url = "<?php echo e(route('fatch_subcat',[':cat_id'])); ?>";
            url = url.replace(':cat_id', cat_id);
            $("#sub_cat").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.subcats.length;
                    // console.log(ts);
                    if (res_length != 0) {
                        $('#subcat_sec').show();
                        $('#subcat').show();
                        $('#sub_cat').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.subcats, function(key, value) {
                            $("#sub_cat").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#subcat_sec').hide();
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#subcat').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_cat').on('change', function() {
            var id = this.value;
            var url = "<?php echo e(route('fatch_sub_subcat',[':id'])); ?>";
            url = url.replace(':id', id);
            $("#sub_sub_cat").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcats.length;
                    if (res_length != 0) {
                        $('#sub_subcat_sec').show();
                        $('#sub_subcat').show();
                        $('#sub_sub_cat').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcats, function(key, value) {
                            $("#sub_sub_cat").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#sub_subcat_sec').hide();
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_sub_cat').on('change', function() {
            var id = this.value;
            var url = "<?php echo e(route('fatch_sub_subcat1',[':id'])); ?>";
            url = url.replace(':id', id);
            $("#sub_sub_cat1").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcat1s.length;
                    if (res_length != 0) {
                        $('#sub_subcat1_sec').show();
                        $('#sub_subcat1').show();
                        $('#sub_sub_cat1').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcat1s, function(key, value) {
                            $("#sub_sub_cat1").append('\
                                <option value="' + value.id + '">' + value.name + '</option>');
                        });
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat2').hide();
                    } else {
                        $('#sub_subcat1_sec').hide();
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat1').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });
        });

        $('#sub_sub_cat1').on('change', function() {
            var id = this.value;

            var url = "<?php echo e(route('fatch_sub_subcat2',[':id'])); ?>";
            url = url.replace(':id', id);
            $("#sub_sub_cat2").html('');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    let res_length = response.sub_subcat2s.length;
                    if (res_length != 0) {
                        $('#sub_subcat2_sec').show();
                        $('#sub_subcat2').show();
                        $('#sub_sub_cat2').html('<option value="" selected hidden>-- Open this select menu --</option>');
                        $.each(response.sub_subcat2s, function(key, value) {
                            $("#sub_sub_cat2").append('\
                                    <option value="' + value.id + '">' + value.name + '</option>');
                        });
                    } else {
                        $('#sub_subcat2_sec').hide();
                        $('#sub_subcat2').hide();
                    }
                }
            });

        });

    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.master.admin_shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/shop/shop_admin/shop_edit_product.blade.php ENDPATH**/ ?>