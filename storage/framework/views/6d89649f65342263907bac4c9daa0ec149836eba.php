<?php $__env->startSection('title', $viewData['title']); ?>
<?php $__env->startSection('subtitle', $viewData['subtitle']); ?>
<?php $__env->startSection('content'); ?>
<h1>About Us</h1>
<p><?php echo e($viewData['content']); ?></p>
<p><?php echo e($viewData['autori']); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/michelesorbo/Desktop/Progetti Laravel/onlineStore2/resources/views/home/about.blade.php ENDPATH**/ ?>