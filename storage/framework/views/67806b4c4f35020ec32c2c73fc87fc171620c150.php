<?php $__env->startSection('title'); ?>
    Detail for <?php echo e($customer->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1>Detail For <?php echo e($customer->name); ?></h1>
            <p><a href="/customers/<?php echo e($customer->id); ?>/edit">Edit</a></p>
            <form action="/customers/<?php echo e($customer->id); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>

                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name: </strong> <?php echo e($customer->name); ?></p>
            <p><strong>Email: </strong> <?php echo e($customer->email); ?></p>
            <p><strong>Company: </strong> <?php echo e($customer->company->name); ?></p>
        </div>
    </div>

    <?php if($customer->image): ?>
        <div class="row">
            <div class="col-12">
                <img src="<?php echo e(asset('storage/' . $customer->image)); ?>" alt="" class="img-thumbnail">
            </div>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/customers/show.blade.php ENDPATH**/ ?>