<?php $__env->startSection('title'); ?>
        Customer List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <p><a href="customers/create">Add New Customer</a></p>
        </div>
    </div>

    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-2">
                <?php echo e($customer->id); ?>

            </div>
            <div class="col-4">
                <a href="/customers/<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></a>
            </div>
            <div class="col-4"><?php echo e($customer->company->name); ?></div>
            <div class="col-2"><?php echo e($customer->status); ?></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/customers/index.blade.php ENDPATH**/ ?>