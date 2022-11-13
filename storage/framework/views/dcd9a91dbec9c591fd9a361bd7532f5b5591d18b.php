<?php $__env->startSection('title', $viewData['title']); ?>
<?php $__env->startSection('subtitle', $viewData['subtitle']); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $viewData['prodotti']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            <img src="<?php echo e(asset('/storage/'.$product->getImage())); ?>" class="card-img-top img-card">
            <div class="card-body text-center">
                <a href="<?php echo e(route('product.show', ['id'=> $product->getId()])); ?>" class="btn bg-primary text-white"><?php echo e($product->getName()); ?></a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/michelesorbo/Desktop/Progetti Laravel/onlineStore2/resources/views/product/index.blade.php ENDPATH**/ ?>