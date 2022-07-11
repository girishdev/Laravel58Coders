<?php $__env->startSection('title'); ?>
    Add New Customer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1>Add New Customer</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST" enctype="multipart/form-data">
                <?php echo $__env->make('customers.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <button type="submit" class="btn btn-primary">Add Customer</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/customers/create.blade.php ENDPATH**/ ?>