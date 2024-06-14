<?php echo e(Form::open(array('route' => 'feature_store', 'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('Heading', __('Heading'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::text('feature_heading',null, ['class' => 'form-control ', 'placeholder' => __('Enter Heading')])); ?>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('Description', __('Description'), ['class' => 'form-label'])); ?>

                    <?php echo e(Form::textarea('feature_description', null, ['class' => 'form-control summernote-simple', 'placeholder' => __('Enter Description')])); ?>

                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <?php echo e(Form::label('Logo', __('Logo'), ['class' => 'form-label'])); ?>

                    <input type="file" name="feature_logo" class="form-control" required="required">
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
    </div>
<?php echo e(Form::close()); ?>








<?php /**PATH D:\Xampp\htdocs\erpg\Modules/LandingPage\Resources/views/landingpage/features/create.blade.php ENDPATH**/ ?>