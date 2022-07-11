<?php $__env->startSection('title'); ?>
    Edit Details For <?php echo e($customer->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for <?php echo e($customer->name); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers/<?php echo e($customer->id); ?>" method="POST" enctype="multipart/form-data">
                <?php echo method_field('PATCH'); ?>
                <?php echo $__env->make('customers.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <button type="submit" class="btn btn-primary">Save Customer</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/customers/edit.blade.php ENDPATH**/ ?>