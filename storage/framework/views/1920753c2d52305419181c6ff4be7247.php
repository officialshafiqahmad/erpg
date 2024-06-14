<?php echo e(Form::open(array('route' => 'screenshots_store', 'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('Heading', __('Heading'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::text('screenshots_heading',null, ['class' => 'form-control ', 'placeholder' => __('Enter Heading')])); ?>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('screenshots', __('Screenshots'), ['class' => 'form-label'])); ?>

                    <input type="file" name="screenshots" class="form-control" required="required">
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
    </div>
<?php echo e(Form::close()); ?>


<?php /**PATH D:\Xampp\htdocs\erpg\Modules/LandingPage\Resources/views/landingpage/screenshots/create.blade.php ENDPATH**/ ?>