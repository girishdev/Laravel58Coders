<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo e(old('name') ?? $customer->name); ?>" class="form-control">
    <div><?php echo e($errors->first('name')); ?></div>
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo e(old('email') ?? $customer->email); ?>" class="form-control">
    <div><?php echo e($errors->first('email')); ?></div>
</div>








<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="" disabled>Select customer status</option>
        <?php $__currentLoopData = $customer->statusOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusOptionKey => $statusOptionValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($statusOptionKey); ?>" <?php echo e($customer->status == $statusOptionValue ? 'selected' : ''); ?>><?php echo e($statusOptionValue); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($company->id); ?>" <?php echo e($company->id == $customer->company_id ? 'selected' : ''); ?>><?php echo e($company->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="py-2">
    <div><?php echo e($errors->first('image')); ?></div>
</div>
<?php echo csrf_field(); ?>
<?php /**PATH /var/www/html/Laravel58Coders/resources/views/customers/form.blade.php ENDPATH**/ ?>