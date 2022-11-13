<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
  <div class="card-header">
    Admin Panel - Home Page
  </div>
  <div class="card-body">
    Welcome to the Admin Panel, use the sidebar to navigate between the different options.
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMAZIONE\Progetti Laravel\onlineStore4\resources\views/admin/index.blade.php ENDPATH**/ ?>