
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Books Management</h2>
        </div>
        <div class="col-lg-12 text-center" style="margin-top: 10px; margin-bottom: 10px;">
            <a class="btn btn-success" href="<?php echo e(route('books.create')); ?>">Add book</a>
            <a class="btn btn-success" href="/search">Search book</a>
        </div>
    </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>

    <?php if(sizeof($books) > 0): ?>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Authorid</th>
                <th>title</th>
                <th>ISBN</th>
                <th>pub year</th>
                
            </tr>
            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($book->id); ?></td>
                    <td><?php echo e($book->authorid); ?></td>
                    <td><?php echo e($book->title); ?></td>
                    <td><?php echo e($book->ISBN); ?></td>
                    <td><?php echo e($book->pub_year); ?></td>
                    <td>
                        <form action="<?php echo e(route('books.destroy', $book->id)); ?>" method="POST">
                            <a class="btn btn-info" href="<?php echo e(route('books.show', $book->id)); ?>">Show</a>
                            <a class="btn btn-primary" href="<?php echo e(route('books.edit', $book->id)); ?>">Edit</a>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    <?php else: ?>
        <div class="alert alert-alert">Start Adding to the Database.</div>
    <?php endif; ?>
    <?php echo $books->links(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('books.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\Xampp\htdocs\sem2\resources\views/books/index.blade.php ENDPATH**/ ?>