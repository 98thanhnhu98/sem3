
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <h2 class="text-center">Show Books</h2>
    </div>
    <div class="col-lg-12 text-center" style="margin-top:10px;margin-bottom: 10px;">
        <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>">Back</a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title : </strong>
            <?php echo e($book->title); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ISBN : </strong>
            <?php echo e($book->ISBN); ?>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>pub_year : </strong>
            <?php echo e($book->pub_year); ?>

        </div>
    </div>
</div>
<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\Xampp\htdocs\sem2\resources\views/books/show.blade.php ENDPATH**/ ?>