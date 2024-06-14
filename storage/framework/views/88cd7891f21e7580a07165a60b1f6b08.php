<?php echo e(Form::model(null, array('route' => array('custom_page.update', $key), 'method' => 'PUT'))); ?>

    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('name',__('Page Name'),['class'=>'form-label'])); ?>

                <?php if($page['menubar_page_name'] == 'Terms and Conditions' || $page['menubar_page_name'] == 'Privacy Policy'): ?>
                <?php echo e(Form::text('menubar_page_name', $page['menubar_page_name'], ['class' => 'form-control font-style', 'placeholder' => __('Enter Plan Name'), 'required' => 'required', 'readonly' => 'readonly'])); ?>

                <?php else: ?>
                <?php echo e(Form::text('menubar_page_name', $page['menubar_page_name'], ['class' => 'form-control font-style', 'placeholder' => __('Enter Plan Name'), 'required' => 'required'])); ?>

                <?php endif; ?>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="template_name" value="page_content"
                           id="page_content" data-name="page_content"  <?php echo e(( isset($page['template_name']) && $page['template_name'] == 'page_content') ? "checked = 'checked'" : ''); ?>>
                    <label class="form-check-label" for="page_content">
                        <?php echo e('Page Content'); ?>

                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="template_name"  value="page_url" id="page_url"
                           data-name="page_url" <?php echo e(( isset($page['template_name']) && $page['template_name'] == 'page_url') ? "checked = 'checked'" : ''); ?>>
                    <label class="form-check-label" for="page_url">
                        <?php echo e('Page URL'); ?>

                    </label>
                </div>
            </div>

            <div class="form-group col-md-12 page_content">
                <?php echo e(Form::label('description', __('Page Content'), ['class' => 'form-label'])); ?>

                <?php echo Form::textarea('menubar_page_contant', (isset($page['menubar_page_contant']) && !empty($page['menubar_page_contant'])) ? $page['menubar_page_contant'] : '' , [
                    'class' => 'form-control summernote-simple',
                    'rows' => '5',
                ]); ?>

            </div>

            <div class="form-group col-md-12 page_url">
                <?php echo e(Form::label('page_url', __('Page URL'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('page_url', ( isset($page['page_url']) && !empty($page['page_url'])) ? $page['page_url'] : '', ['class' => 'form-control font-style', 'placeholder' => __('Enter Page URL')])); ?>

            </div>
            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="header" name="header" <?php echo e($page['header'] == 'on' ? 'checked' : ""); ?> />
                    <label class="form-check-label f-w-600 pl-1" for="header" ><?php echo e(__('Header')); ?></label>
                </div>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="footer" name="footer"<?php echo e($page['footer'] == 'on' ? 'checked' : ""); ?>/>
                    <label class="form-check-label f-w-600 pl-1" for="footer"><?php echo e(__('Footer')); ?></label>
                </div>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="login" name="login"<?php echo e($page['login'] == 'on' ? 'checked' : ""); ?>/>
                    <label class="form-check-label f-w-600 pl-1" for="login"><?php echo e(__('Login')); ?></label>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-light" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
    </div>
<?php echo e(Form::close()); ?>



<script>

    $(document).ready(function() {
        $('input[name="template_name"]:checked').trigger('change');
    });
    $('input[name="template_name"]').change(function() {
        var radioValue = $('input[name="template_name"]:checked').val();
        var page_url = $('.page_url');
        var page_content = $('.page_content');

        if (radioValue === "page_content") {
            page_content.show();
            page_url.hide();
        } else {
            page_content.hide();
            page_url.show();
        }
    });

  </script>
<?php /**PATH D:\Xampp\htdocs\erpg\Modules/LandingPage\Resources/views/landingpage/menubar/edit.blade.php ENDPATH**/ ?>