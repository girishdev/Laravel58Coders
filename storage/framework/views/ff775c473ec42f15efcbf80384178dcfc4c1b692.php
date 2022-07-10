<?php $__env->startSection('title', 'Question and Answers'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Question and Answers</h1>
    <p><a href="/qanda/create">Add Question and Answers</a></p>

    <?php $__currentLoopData = $gitbasic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><b>Question Number: </b><?php echo e(++$key); ?></p>
        <p><b>Topic: </b><?php echo e($question->topic); ?></p>
        <p><b>Question Type: </b><?php echo e($question->qtype); ?></p>
        <p><b>Question: </b><?php echo e($question->question); ?></p>
        <p><b>Answer: </b><?php echo $question->answer; ?></p>
        <?php if(isset($question->link)): ?>
            <p><b>Link: </b><a href="<?php echo e($question->link); ?>" target="_blank"><?php echo e($question->link); ?></a></p>
        <?php endif; ?>
        <form action="/qanda/<?php echo e($question->id); ?>" method="POST">
            <?php echo method_field('DELETE'); ?>
            <?php echo csrf_field(); ?>
            <p>
                <b>Created At: </b><?php echo e($question->created_at); ?> |
                <a class="btn btn-primary btn-sm" href="/qanda/<?php echo e($question->id); ?>/edit" role="button">Edit</a> |
                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </p>
        </form>
        <hr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="pagination">
        <?php echo $gitbasic->render(); ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/QandA/gitbasic.blade.php ENDPATH**/ ?>