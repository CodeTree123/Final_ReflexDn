<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="my-3">
        <h4 class="text-bg-blue-grey mb-3">Top Sell</h4>

        <div class="d-flex flex-wrap justify-content-center">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('shop_single_product',$product->id)); ?>" class="mb-3 px-2">
                <div class="card" style="width: 230px;">
                    <img src="<?php echo e(asset('public/uploads/shop_product/'.$product->pro_img)); ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h6 class="card-title"><?php echo e($product->pro_name); ?></h6>
                        <p class="card-text mb-2">Price: <?php echo e($product->pro_price); ?> Taka</p>
                        <p class="card-text mb-2"><?php echo e($product->supplier->fname." ".$product->supplier->lname); ?></p>
                        <?php if($product->pro_stock->status == 1): ?>
                        <p class="card-text text-success">In Stock</p>
                        <?php else: ?>
                        <p class="card-text text-danger ">Out Of Stock</p>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master.shop_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna1802\resources\views/shop/shop_home.blade.php ENDPATH**/ ?>