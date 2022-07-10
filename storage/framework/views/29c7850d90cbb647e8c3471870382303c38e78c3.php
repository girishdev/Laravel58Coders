<?php $__env->startSection('title'); ?>
    Edit Question and Answers
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <h1>Edit Question and Answers</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/qanda/<?php echo e($question->id); ?>" method="POST">
                <?php echo method_field('PATCH'); ?>
                <div class="form-group">
                    <label for="topic">Topic: </label>
                    <select name="topic" id="topic" class="form-control">
                        <option value="" disabled>Select Question and Answers Topic</option>
                        <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topicsValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($topicsValue); ?>" <?php echo e($question->topic == $topicsValue ? 'selected' : ''); ?>><?php echo e($topicsValue); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="qtype">Question Type: </label>
                    <select name="qtype" id="qtype" class="form-control">
                        <option value="" disabled>Select Question Type</option>
                        <?php $__currentLoopData = $qtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qtypeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($qtypeValue); ?>" <?php echo e($question->qtype == $qtypeValue ? 'selected' : ''); ?>><?php echo e($qtypeValue); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="question">Question: </label>
                    <input type="text" id="question" name="question" value="<?php echo e(old('question') ?? $question->question); ?>" class="form-control">
                    <div><?php echo e($errors->first('question')); ?></div>
                </div>

                <div class="form-group">
                    <label for="answer">Answer: </label>
                    <textarea class="form-control" id="answer" name="answer" rows="8"><?php echo e($question->answer); ?></textarea>
                    <div><?php echo e($errors->first('answer')); ?></div>
                </div>

                <div class="form-group">
                    <label for="link">Link: </label>
                    <input type="text" name="link" value="<?php echo e(old('link') ?? $question->link); ?>" class="form-control">
                    <div><?php echo e($errors->first('link')); ?></div>
                </div>

                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-primary">Save Question and Answers</button>

            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        ClassicEditor
            .create( document.querySelector( '#answer' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/Laravel58Coders/resources/views/QandA/edit.blade.php ENDPATH**/ ?>