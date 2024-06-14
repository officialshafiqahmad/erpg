<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>

<?php
    $lang = \App\Models\Utility::getValByName('default_language');
   // $logo=asset(Storage::url('uploads/logo/'));
    $logo=\App\Models\Utility::get_file('uploads/logo');

    $logo_light = \App\Models\Utility::getValByName('logo_light');
    $logo_dark = \App\Models\Utility::getValByName('logo_dark');
    $company_favicon = \App\Models\Utility::getValByName('company_favicon');
    $setting = \App\Models\Utility::colorset();
    $color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
    $flag = (!empty($setting['color_flag'])) ? $setting['color_flag'] : '';
    $SITE_RTL= isset($setting['SITE_RTL'])?$setting['SITE_RTL']:'off';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $google_recaptcha_version=['v2-checkbox' => __('v2'),'v3' => __('v3')];
?>


<?php
    $file_type = config('files_types');
    $setting = App\Models\Utility::settings();

   $local_storage_validation    = $setting['local_storage_validation'];
   $local_storage_validations   = explode(',', $local_storage_validation);

   $s3_storage_validation    = $setting['s3_storage_validation'];
   $s3_storage_validations   = explode(',', $s3_storage_validation);

   $wasabi_storage_validation    = $setting['wasabi_storage_validation'];
   $wasabi_storage_validations   = explode(',', $wasabi_storage_validation);

?>
<style>


</style>

<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //     const body = document.querySelector("body");
    //     const input = document.getElementById("colorPicker");
    //     const colorCode = document.getElementById("colorCode");
    //     const button = document.getElementById("changeColorButton");

    //     setColor();
    //     input.addEventListener("input", setColor);

    //     function setColor() {
    //         // body.style.backgroundColor = input.value;
    //         colorCode.innerHTML = input.value;
    //     }
    // });


</script>

<?php $__env->startPush('css-page'); ?>
    <?php if($color == 'theme-3'): ?>
        <style>
            .btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary,
            .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
                color: #ffffff;
                background-color: #6fd943 !important;
                border-color: #6fd943 !important;
            }

            .btn-outline-primary:hover
            {
                color: #ffffff;
                background-color: #6fd943 !important;
                border-color: #6fd943 !important;
            }

            .btn[class*="btn-outline-"]:hover {

                border-color: #6fd943 !important;
            }
        </style>
    <?php endif; ?>
    <?php if($color == 'theme-2'): ?>
        <style>
            .btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
                color: #ffffff;
                background: linear-gradient(141.55deg, rgba(240, 244, 243, 0) 3.46%, #4ebbd3 99.86%)#1f3996 !important;
                border-color: #4ebbd3 !important;
            }

            .btn-outline-primary:hover
            {
                color: #ffffff;
                background: linear-gradient(141.55deg, rgba(240, 244, 243, 0) 3.46%, #4ebbd3 99.86%)#1f3996 !important;
                border-color: #4ebbd3 !important;
            }
            .btn.btn-outline-primary{
                color: #1F3996;
                border-color: #4ebbd3 !important;
            }
        </style>
    <?php endif; ?>
    <?php if($color == 'theme-4'): ?>
        <style>
            .btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
                color: #ffffff;
                background-color: #584ed2 !important;
                border-color: #584ed2 !important;

            }

            .btn-outline-primary:hover
            {
                color: #ffffff;
                background-color: #584ed2 !important;
                border-color: #584ed2 !important;
            }
            .btn.btn-outline-primary{
                color: #584ed2;
                border-color: #584ed2 !important;
            }
        </style>
    <?php endif; ?>
    <?php if($color == 'theme-1'): ?>
        <style>
            .btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary,
            .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
                color: #ffffff;
                background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, rgba(255, 58, 110, 0.6) 99.86%), #51459d !important;
                border-color: #51459d !important;
            }


            body.theme-1 .btn-outline-primary:hover
            {
                color: #ffffff;
                background: linear-gradient(141.55deg, rgba(81, 69, 157, 0) 3.46%, rgba(255, 58, 110, 0.6) 99.86%), #51459d !important;
                border-color: #51459d !important;
            }
        </style>
    <?php endif; ?>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300,
        })

        $('.colorPicker').on('click', function(e) {
            $('body').removeClass('custom-color');
            if (/^theme-\d+$/) {
                $('body').removeClassRegex(/^theme-\d+$/);
            }
            $('body').addClass('custom-color');
            $('.themes-color-change').removeClass('active_color');
            $(this).addClass('active_color');
            const input = document.getElementById("color-picker");
            setColor();
            input.addEventListener("input", setColor);

            function setColor() {
                $(':root').css('--color-customColor', input.value);
            }

            $(`input[name='color_flag`).val('true');
        });

        $('.themes-color-change').on('click', function() {

        $(`input[name='color_flag`).val('false');

            var color_val = $(this).data('value');
            $('body').removeClass('custom-color');
            if(/^theme-\d+$/)
            {
                $('body').removeClassRegex(/^theme-\d+$/);                
            }
            $('body').addClass(color_val);
            $('.theme-color').prop('checked', false);
            $('.themes-color-change').removeClass('active_color');
            $('.colorPicker').removeClass('active_color');
            $(this).addClass('active_color');
            $(`input[value=${color_val}]`).prop('checked', true);
        });
        
        $.fn.removeClassRegex = function(regex) {
    return $(this).removeClass(function(index, classes) {
        return classes.split(/\s+/).filter(function(c) {
            return regex.test(c);
        }).join(' ');
    });
};

        // storage setting
        $(document).on('change','[name=storage_setting]',function(){
            if($(this).val() == 's3'){
                $('.s3-setting').removeClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').addClass('d-none');
            }else if($(this).val() == 'wasabi'){
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').removeClass('d-none');
                $('.local-setting').addClass('d-none');
            }else{
                $('.s3-setting').addClass('d-none');
                $('.wasabi-setting').addClass('d-none');
                $('.local-setting').removeClass('d-none');
            }
        });
    </script>

    <script>
        document.getElementById('logo_dark').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image').src = src
        }
        document.getElementById('logo_light').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image1').src = src
        }
        document.getElementById('favicon').onchange = function () {
            var src = URL.createObjectURL(this.files[0])
            document.getElementById('image2').src = src
        }
    </script>

    <script type="text/javascript">

        $(document).on("click", '.send_email', function(e)
        {
            e.preventDefault();
            var title = $(this).attr('data-title');
            var size = 'md';
            var url = $(this).attr('data-url');

            if (typeof url != 'undefined') {
                $("#commonModal .modal-title").html(title);
                $("#commonModal .modal-dialog").addClass('modal-' + size);
                $("#commonModal").modal('show');


                $.post(url, {
                    _token:'<?php echo e(csrf_token()); ?>',
                    mail_driver: $("#mail_driver").val(),
                    mail_host: $("#mail_host").val(),
                    mail_port: $("#mail_port").val(),
                    mail_username: $("#mail_username").val(),
                    mail_password: $("#mail_password").val(),
                    mail_encryption: $("#mail_encryption").val(),
                    mail_from_address: $("#mail_from_address").val(),
                    mail_from_name: $("#mail_from_name").val(),

                }, function(data) {
                    $('#commonModal .body').html(data);
                });
            }
        });
        $(document).on('submit', '#test_email', function(e) {
            e.preventDefault();
            // $("#email_sending").show();
            var post = $(this).serialize();
            var url = $(this).attr('action');
            $.ajax({
                type: "post",
                url: url,
                data: post,
                cache: false,
                beforeSend: function() {
                    $('#test_email .btn-create').attr('disabled', 'disabled');
                },
                success: function(data) {
                    // console.log(data)
                    if (data.success) {
                        show_toastr('success', data.message, 'success');
                    } else {
                        show_toastr('error', data.message, 'error');
                    }
                    // $("#email_sending").hide();
                    $('#commonModal').modal('hide');


                },
                complete: function() {
                    $('#test_email .btn-create').removeAttr('disabled');
                },
            });
        });
    </script>

    
    <script type="text/javascript">
        function enablecookie() {
            const element = $('#enable_cookie').is(':checked');
            $('.cookieDiv').addClass('disabledCookie');
            if (element==true) {
                $('.cookieDiv').removeClass('disabledCookie');
                $("#cookie_logging").attr('checked', true);
            } else {
                $('.cookieDiv').addClass('disabledCookie');
                $("#cookie_logging").attr('checked', false);
            }
        }
    </script>

    <script>
    if ($('#cust-darklayout').length > 0) {
        var custthemedark = document.querySelector("#cust-darklayout");
        custthemedark.addEventListener("click", function() {
            if (custthemedark.checked) {
                $('#main-style-link').attr('href', '<?php echo e(config('app.url')); ?>' + '/public/assets/css/style-dark.css');
                document.body.style.background = 'linear-gradient(141.55deg, #22242C 3.46%, #22242C 99.86%)';

                $('.dash-sidebar .main-logo a img').attr('src', '<?php echo e(isset($logo_light) && !empty($logo_light) ?  $logo . $logo_light :  $logo . "/logo-light.png"); ?>');

            } else {
                $('#main-style-link').attr('href', '<?php echo e(config('app.url')); ?>' + '/public/assets/css/style.css');
                document.body.style.setProperty('background', 'linear-gradient(141.55deg, rgba(240, 244, 243, 0) 3.46%, #f0f4f3 99.86%)', 'important');

                $('.dash-sidebar .main-logo a img').attr('src', '<?php echo e(isset($logo_light) && !empty($logo_light) ? $logo . $logo_light : $logo . "/logo-dark.png"); ?>');

            }
        });
    }
        
        if ($('#cust-theme-bg').length > 0) {
            var custthemebg = document.querySelector("#cust-theme-bg");
            custthemebg.addEventListener("click", function() {
                if (custthemebg.checked) {
                    document.querySelector(".dash-sidebar").classList.add("transprent-bg");
                    document
                        .querySelector(".dash-header:not(.dash-mob-header)")
                        .classList.add("transprent-bg");
                } else {
                    document.querySelector(".dash-sidebar").classList.remove("transprent-bg");
                    document
                        .querySelector(".dash-header:not(.dash-mob-header)")
                        .classList.remove("transprent-bg");
                }
            });
        }
    </script>


<?php $__env->stopPush(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Settings')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#brand-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Brand Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#email-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Email Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#payment-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Payment Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#pusher-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Pusher Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#recaptcha_settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('ReCaptcha Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#storage-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Storage Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#seo-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('SEO Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#cookie-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Cookie Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#cache-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Cache Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#chat-gpt-settings" class="list-group-item list-group-item-action border-0"><?php echo e(__('Chat GPT Settings')); ?>

                                <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>

                        </div>
                    </div>
                </div>

                <div class="col-xl-9">
                

                    <!--Site Settings-->
                    <div id="brand-settings" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Brand Settings')); ?></h5>
                        </div>
                        <?php echo e(Form::model($settings, ['url' => 'systems', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card logo_card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Logo dark')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="setting-card">
                                                <div class="logo-content mt-4">
                                                    <img id="image" src="<?php echo e($logo.'/'.(isset($logo_dark) && !empty($logo_dark)?$logo_dark:'logo-dark.png').'?timestamp='.time()); ?>"
                                                         class="big-logo">
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="logo_dark">
                                                        <div class=" bg-primary company_logo_update"> <i
                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" name="logo_dark" id="logo_dark" class="form-control file" data-filename="logo_dark">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['logo_dark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                    </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card logo_card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Logo Light')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-4">
                                                    <img id="image1" src="<?php echo e($logo.'/'.(isset($logo_light) && !empty($logo_light)?$logo_light:'logo-light.png').'?timestamp='.time()); ?>"
                                                         class="big-logo img_setting">
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="logo_light">
                                                        <div class=" bg-primary dark_logo_update"> <i class="ti ti-upload px-1">
                                                            </i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" name="logo_light" id="logo_light" class="form-control file" data-filename="logo_light">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['logo_light'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6">
                                    <div class="card logo_card">
                                        <div class="card-header">
                                            <h5><?php echo e(__('Favicon')); ?></h5>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class=" setting-card">
                                                <div class="logo-content mt-4">
                                                    <img id="image2" src="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png').'?timestamp='.time()); ?>" width="50px"
                                                         class="img_setting">
                                                </div>
                                                <div class="choose-files mt-5">
                                                    <label for="favicon">
                                                        <div class="bg-primary company_favicon_update"> <i
                                                                class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                        </div>
                                                        <input type="file" class="form-control file"  id="favicon" name="favicon"
                                                               data-filename="favicon">
                                                    </label>
                                                </div>
                                                <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="row">
                                                    <span class="invalid-logo" role="alert">
                                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                                    </span>
                                                </div>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title_text',__('Title Text'),array('class'=>'form-label'))); ?>

                                            <?php echo e(Form::text('title_text',null,array('class'=>'form-control','placeholder'=>__('Title Text')))); ?>

                                            <?php $__errorArgs = ['title_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-title_text" role="alert">
                                                     <strong class="text-danger"><?php echo e($message); ?></strong>
                                                 </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('footer_text',__('Footer Text'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('footer_text',Utility::getValByName('footer_text'),array('class'=>'form-control','placeholder'=>__('Enter Footer Text')))); ?>

                                            <?php $__errorArgs = ['footer_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-footer_text" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('default_language',__('Default Language'),['class'=>'form-label'])); ?>

                                            <div class="changeLanguage">
                                                <select name="default_language" id="default_language" class="form-control select">
                                                    <?php $__currentLoopData = \App\Models\Utility::languages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($lang == $code): ?> selected <?php endif; ?> value="<?php echo e($code); ?>">
                                                            <?php echo e(ucFirst($language)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php $__errorArgs = ['default_language'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-default_language" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-switch">
                                            <label class="mb-1 mt-3" for="SITE_RTL"><?php echo e(__('Enable RTL')); ?></label>
                                            <div class="">
                                                <input type="checkbox" name="SITE_RTL" id="SITE_RTL" data-toggle="switchbutton"  data-onstyle="primary"  <?php echo e($settings['SITE_RTL'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                <label class="custom-control-label" for="SITE_RTL"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="mb-1 mt-3" for="display_landing_page"><?php echo e(__('Enable Landing Page')); ?></label>
                                            <div class="">
                                                <input type="checkbox" name="display_landing_page" class="form-check-input" id="display_landing_page" data-toggle="switchbutton" <?php echo e((Utility::getValByName('display_landing_page') == 'on') ? 'checked' : ''); ?> data-onstyle="primary">
                                                <label class="form-check-label" for="display_landing_page"></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="mb-1 mt-3" for="signup_button"><?php echo e(__('Enable Sign-Up Page')); ?></label>
                                            <div class="">
                                                <input type="checkbox" name="enable_signup" id="enable_signup" data-toggle="switchbutton"  <?php echo e($settings['enable_signup'] == 'on' ? 'checked="checked"' : ''); ?> data-onstyle="primary">
                                                <label class="form-check-label" for="enable_signup"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group">
                                            <label class="mb-1 mt-3" for="email_verification"><?php echo e(__('Email Verification')); ?></label>
                                            <div class="">
                                                <input type="checkbox" name="email_verification" id="email_verification" data-toggle="switchbutton"  <?php echo e($settings['email_verification'] == 'on' ? 'checked="checked"' : ''); ?> data-onstyle="primary">
                                                <label class="form-check-label" for="email_verification"></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <h4 class="small-title"><?php echo e(__('Theme Customizer')); ?></h4>
                                <div class="setting-card setting-logo-box p-3">
                                    <div class="row">
                                        <div class="col-lg-4 col-xl-4 col-md-4">
                                            <h6 class="mt-2">
                                                <i data-feather="credit-card" class="me-2"></i><?php echo e(__('Primary color settings')); ?>

                                            </h6>

                                            <hr class="my-2" />
                                            <div class="color-wrp">
                                                <div class="theme-color themes-color">
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-1' ? 'active_color' : ''); ?>" data-value="theme-1"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-1"<?php echo e($color == 'theme-1' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-2' ? 'active_color' : ''); ?>" data-value="theme-2"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-2"<?php echo e($color == 'theme-2' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-3' ? 'active_color' : ''); ?>" data-value="theme-3"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-3"<?php echo e($color == 'theme-3' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-4' ? 'active_color' : ''); ?>" data-value="theme-4"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-4"<?php echo e($color == 'theme-4' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-5' ? 'active_color' : ''); ?>" data-value="theme-5"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-5"<?php echo e($color == 'theme-5' ? 'checked' : ''); ?>>
                                                    <br>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-6' ? 'active_color' : ''); ?>" data-value="theme-6"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-6"<?php echo e($color == 'theme-6' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-7' ? 'active_color' : ''); ?>" data-value="theme-7"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-7"<?php echo e($color == 'theme-7' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-8' ? 'active_color' : ''); ?>" data-value="theme-8"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-8"<?php echo e($color == 'theme-8' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-9' ? 'active_color' : ''); ?>" data-value="theme-9"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-9"<?php echo e($color == 'theme-9' ? 'checked' : ''); ?>>
                                                    <a href="#!" class="themes-color-change <?php echo e($color == 'theme-10' ? 'active_color' : ''); ?>" data-value="theme-10"></a>
                                                    <input type="radio" class="theme_color d-none" name="color" value="theme-10"<?php echo e($color == 'theme-10' ? 'checked' : ''); ?>>
                                                </div>
                                                <div class="color-picker-wrp">
                                                        <input type="color" value="<?php echo e($color ? $color : ''); ?>" class="colorPicker <?php echo e(isset($flag) && $flag == 'true' ? 'active_color' : ''); ?>" name="custom_color" id="color-picker">                                             
                                                        <input type='hidden' name="color_flag" value = <?php echo e(isset($flag) && $flag == 'true' ? 'true' : 'false'); ?>>
                                                </div>
                                            </div>   
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4">
                                            <h6 class="mt-2">
                                                <i data-feather="layout" class="me-2"></i><?php echo e(__('Sidebar settings')); ?>

                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input" id="cust-theme-bg" name="cust_theme_bg" <?php echo e(!empty($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on' ? 'checked' : ''); ?>/>
                                                <label class="form-check-label f-w-600 pl-1" for="cust-theme-bg"
                                                ><?php echo e(__('Transparent layout')); ?></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-xl-4 col-md-4">
                                            <h6 class="mt-2">
                                                <i data-feather="sun" class="me-2"></i><?php echo e(__('Layout settings')); ?>

                                            </h6>
                                            <hr class="my-2" />
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" class="form-check-input" id="cust-darklayout" name="cust_darklayout"<?php echo e(!empty($settings['cust_darklayout']) && $settings['cust_darklayout'] == 'on' ? 'checked' : ''); ?> />
                                                <label class="form-check-label f-w-600 pl-1" for="cust-darklayout"><?php echo e(__('Dark Layout')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <div class="form-group">
                                        <input class="btn btn-print-invoice btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>

                    <!--Email Settings-->
                    <div id="email-settings" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Email Settings')); ?></h5>
                            <small class="text-muted"><?php echo e(__('This SMTP will be used for system-level email sending. Additionally, if a company user does not set their SMTP, then this SMTP will be used for sending emails.')); ?></small>
                        </div>
                        <div class="card-body">
                            <?php echo e(Form::open(['route' => 'email.settings', 'method' => 'post'])); ?>

                            <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_driver', __('Mail Driver'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_driver', isset($settings['mail_driver']) ? $settings['mail_driver']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail Driver')])); ?>

                                            <?php $__errorArgs = ['mail_driver'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_host', __('Mail Host'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_host', isset($settings['mail_host']) ? $settings['mail_host']  :'', ['class' => 'form-control ', 'placeholder' => __('Enter Mail Host')])); ?>

                                            <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_driver" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_port', __('Mail Port'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_port', isset($settings['mail_port']) ? $settings['mail_port']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail Port')])); ?>

                                            <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_port" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_username', __('Mail Username'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_username', isset($settings['mail_username']) ? $settings['mail_username']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail Username')])); ?>

                                            <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_username" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_password', __('Mail Password'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_password',isset($settings['mail_password']) ? $settings['mail_password']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail Password')])); ?>

                                            <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_password" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_encryption', __('Mail Encryption'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_encryption', isset($settings['mail_encryption']) ? $settings['mail_encryption']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail Encryption')])); ?>

                                            <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_encryption" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_from_address', __('Mail From Address'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_address', isset($settings['mail_from_address']) ? $settings['mail_from_address']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail From Address')])); ?>

                                            <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_address" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('mail_from_name', __('Mail From Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('mail_from_name', isset($settings['mail_from_name']) ? $settings['mail_from_name']  :'', ['class' => 'form-control', 'placeholder' => __('Enter Mail From Name')])); ?>

                                            <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-mail_from_name" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card-footer d-flex justify-content-end">
                                        <div class="form-group me-2">
                                            <a href="#" data-url="<?php echo e(route('test.mail')); ?>"
                                               data-title="<?php echo e(__('Send Test Mail')); ?>" class="btn btn-primary send_email ">
                                                <?php echo e(__('Send Test Mail')); ?>

                                            </a>
                                        </div>


                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                    </div>

                    <!--Payment Settings-->
                    <div class="card" id="payment-settings">
                        <div class="card-header">
                            <h5><?php echo e('Payment Settings'); ?></h5>
                            <small class="text-secondary font-weight-bold">
                                <?php echo e(__('These details will be used to collect subscription plan payments.Each subscription plan will have a payment button based on the below configuration.')); ?>

                            </small>
                        </div>
                        <?php echo e(Form::open(['route' => 'payment.settings', 'method' => 'post'])); ?>

                        <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label class="col-form-label"><?php echo e(__('Currency')); ?> *</label>

                                                <?php echo e(Form::text('currency', isset($admin_payment_setting['currency']) ? $admin_payment_setting['currency']  :'', ['class' => 'form-control font-style', 'required', 'placeholder' => __('Enter Currency')])); ?>

                                                <small class="text-xs">
                                                    <?php echo e(__('Note: Add currency code as per three-letter ISO code')); ?>.
                                                    <a href="https://stripe.com/docs/currencies"
                                                       target="_blank"><?php echo e(__('You can find out how to do that here.')); ?></a>
                                                </small>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="currency_symbol"
                                                       class="col-form-label"><?php echo e(__('Currency Symbol')); ?></label>
                                                <?php echo e(Form::text('currency_symbol', isset($admin_payment_setting['currency_symbol']) ? $admin_payment_setting['currency_symbol']  :'', ['class' => 'form-control', 'required', 'placeholder' => __('Enter Currency Symbol')])); ?>

                                            </div>
                                        </div>
                                        <div class="faq justify-content-center">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="accordion accordion-flush setting-accordion" id="accordionExample">

                                                        <!-- Manually -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseManually"
                                                                        aria-expanded="false" aria-controls="collapseOne">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Manually')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_manually_payment_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_manually_payment_enabled"
                                                                                   name="is_manually_payment_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_manually_payment_enabled']) && $admin_payment_setting['is_manually_payment_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseManually" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-edits">
                                                                                <small class="text-md">
                                                                                    <?php echo e(__('Requesting manual payment for the planned amount for the subscriptions plan.')); ?>

                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Bank Transfer -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseBank"
                                                                        aria-expanded="false" aria-controls="collapseOne">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Bank Transfer')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_bank_transfer_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_bank_transfer_enabled"
                                                                                   name="is_bank_transfer_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_bank_transfer_enabled']) && $admin_payment_setting['is_bank_transfer_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseBank" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-12">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('bank_details', __('Bank Details'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::textarea('bank_details', isset($admin_payment_setting['bank_details']) ? $admin_payment_setting['bank_details'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Your Bank Details'),'rows' => 4])); ?>

                                                                                    <small class="text-xs">
                                                                                        <?php echo e(__('Example : Bank : bank name </br> Account Number : 0000 0000 </br>')); ?>

                                                                                    </small>
                                                                                    <?php if($errors->has('bank_details')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('bank_details')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Stripe -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingOne">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                        aria-expanded="false" aria-controls="collapseOne">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Stripe')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_stripe_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_stripe_enabled"
                                                                                   name="is_stripe_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_stripe_enabled']) && $admin_payment_setting['is_stripe_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingOne"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_key', __('Stripe Key'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_key', isset($admin_payment_setting['stripe_key']) ? $admin_payment_setting['stripe_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Stripe Key')])); ?>

                                                                                    <?php if($errors->has('stripe_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('stripe_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('stripe_secret', __('Stripe Secret'), ['class' => 'col-form-label'])); ?>

                                                                                    <?php echo e(Form::text('stripe_secret', isset($admin_payment_setting['stripe_secret']) ? $admin_payment_setting['stripe_secret'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Stripe Secret')])); ?>

                                                                                    <?php if($errors->has('stripe_secret')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('stripe_secret')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paypal -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Paypal')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_paypal_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_paypal_enabled"
                                                                                   name="is_paypal_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paypal_enabled']) && $admin_payment_setting['is_paypal_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="d-flex">
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-1">
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label text-dark">
                                                                                        <input type="radio"
                                                                                               name="paypal_mode" value="sandbox"
                                                                                               class="form-check-input"
                                                                                            <?php echo e((isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == '') || (isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Sandbox')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mr-2" style="margin-right: 15px;">
                                                                            <div class="border card p-1">
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label text-dark">
                                                                                        <input type="radio"
                                                                                               name="paypal_mode" value="live"
                                                                                               class="form-check-input"
                                                                                            <?php echo e(isset($admin_payment_setting['paypal_mode']) && $admin_payment_setting['paypal_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                        <?php echo e(__('Live')); ?>

                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label class="col-form-label"
                                                                                           for="paypal_client_id"><?php echo e(__('Client ID')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paypal_client_id"
                                                                                           id="paypal_client_id"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['paypal_client_id']) || is_null($admin_payment_setting['paypal_client_id']) ? '' : $admin_payment_setting['paypal_client_id']); ?>"
                                                                                           placeholder="<?php echo e(__('Client ID')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label class="col-form-label"
                                                                                           for="paypal_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paypal_secret_key"
                                                                                           id="paypal_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paypal_secret_key']) ? $admin_payment_setting['paypal_secret_key'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Secret Key')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paystack -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingThree">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                                        aria-expanded="false" aria-controls="collapseThree">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Paystack')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_paystack_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_paystack_enabled"
                                                                                   name="is_paystack_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paystack_enabled']) && $admin_payment_setting['is_paystack_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseThree" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingThree"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paypal_client_id"
                                                                                           class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paystack_public_key"
                                                                                           id="paystack_public_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paystack_public_key']) ? $admin_payment_setting['paystack_public_key'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Public Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paystack_secret_key"
                                                                                           id="paystack_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paystack_secret_key']) ? $admin_payment_setting['paystack_secret_key'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Secret Key')); ?>" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Flutterwave -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingFour">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                                        aria-expanded="false" aria-controls="collapseFour">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Flutterwave')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                   name="is_flutterwave_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_flutterwave_enabled"
                                                                                   name="is_flutterwave_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_flutterwave_enabled']) && $admin_payment_setting['is_flutterwave_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseFour" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingFour"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paypal_client_id"
                                                                                           class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="flutterwave_public_key"
                                                                                           id="flutterwave_public_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['flutterwave_public_key']) ? $admin_payment_setting['flutterwave_public_key'] : ''); ?>"
                                                                                           placeholder="Public Key">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="flutterwave_secret_key"
                                                                                           id="flutterwave_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['flutterwave_secret_key']) ? $admin_payment_setting['flutterwave_secret_key'] : ''); ?>"
                                                                                           placeholder="Secret Key">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Razorpay -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingFive">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                                                        aria-expanded="false" aria-controls="collapseFive">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Razorpay')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_razorpay_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_razorpay_enabled"
                                                                                   name="is_razorpay_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_razorpay_enabled']) && $admin_payment_setting['is_razorpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseFive" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingFive"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paypal_client_id"
                                                                                           class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="razorpay_public_key"
                                                                                           id="razorpay_public_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['razorpay_public_key']) || is_null($admin_payment_setting['razorpay_public_key']) ? '' : $admin_payment_setting['razorpay_public_key']); ?>"
                                                                                           placeholder="Public Key">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paystack_secret_key"
                                                                                           class="col-form-label">
                                                                                        <?php echo e(__('Secret Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="razorpay_secret_key"
                                                                                           id="razorpay_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['razorpay_secret_key']) || is_null($admin_payment_setting['razorpay_secret_key']) ? '' : $admin_payment_setting['razorpay_secret_key']); ?>"
                                                                                           placeholder="Secret Key">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paytm -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSix">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                                                        aria-expanded="false" aria-controls="collapseSix">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Paytm')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_paytm_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_paytm_enabled"
                                                                                   name="is_paytm_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paytm_enabled']) && $admin_payment_setting['is_paytm_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSix" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingSix"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="paypal-label col-form-label"
                                                                               for="paypal_mode"><?php echo e(__('Paytm Environment')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="paytm_mode"
                                                                                                   value="local"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(!isset($admin_payment_setting['paytm_mode']) || $admin_payment_setting['paytm_mode'] == '' || $admin_payment_setting['paytm_mode'] == 'local' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Local')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="paytm_mode"
                                                                                                   value="production"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['paytm_mode']) && $admin_payment_setting['paytm_mode'] == 'production' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Production')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_public_key"
                                                                                           class="col-form-label"><?php echo e(__('Merchant ID')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paytm_merchant_id"
                                                                                           id="paytm_merchant_id"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paytm_merchant_id']) ? $admin_payment_setting['paytm_merchant_id'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Merchant ID')); ?>" />
                                                                                    <?php if($errors->has('paytm_merchant_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_merchant_id')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paytm_merchant_key"
                                                                                           id="paytm_merchant_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paytm_merchant_key']) ? $admin_payment_setting['paytm_merchant_key'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Merchant Key')); ?>" />
                                                                                    <?php if($errors->has('paytm_merchant_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_merchant_key')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_industry_type"
                                                                                           class="col-form-label"><?php echo e(__('Industry Type')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paytm_industry_type"
                                                                                           id="paytm_industry_type"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['paytm_industry_type']) ? $admin_payment_setting['paytm_industry_type'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Industry Type')); ?>" />
                                                                                    <?php if($errors->has('paytm_industry_type')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('paytm_industry_type')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mercado Pago -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingseven">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseseven"
                                                                        aria-expanded="false" aria-controls="collapseseven">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Mercado Pago')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_mercado_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_mercado_enabled"
                                                                                   name="is_mercado_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_mercado_enabled']) && $admin_payment_setting['is_mercado_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseseven" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingseven"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="coingate-label col-form-label"
                                                                               for="mercado_mode"><?php echo e(__('Mercado Mode')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="mercado_mode"
                                                                                                   value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e((isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == '') || (isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="mercado_mode"
                                                                                                   value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['mercado_mode']) && $admin_payment_setting['mercado_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mercado_access_token"
                                                                                           class="col-form-label"><?php echo e(__('Access Token')); ?></label>
                                                                                    <input type="text"
                                                                                           name="mercado_access_token"
                                                                                           id="mercado_access_token"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['mercado_access_token']) ? $admin_payment_setting['mercado_access_token'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Access Token')); ?>" />
                                                                                    <?php if($errors->has('mercado_secret_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('mercado_access_token')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Mollie -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingeight">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseeight"
                                                                        aria-expanded="false" aria-controls="collapseeight">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Mollie')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_mollie_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_mollie_enabled"
                                                                                   name="is_mollie_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_mollie_enabled']) && $admin_payment_setting['is_mollie_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseeight" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingeight"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_api_key"
                                                                                           class="col-form-label"><?php echo e(__('Mollie Api Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="mollie_api_key"
                                                                                           id="mollie_api_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['mollie_api_key']) || is_null($admin_payment_setting['mollie_api_key']) ? '' : $admin_payment_setting['mollie_api_key']); ?>"
                                                                                           placeholder="Mollie Api Key">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_profile_id"
                                                                                           class="col-form-label"><?php echo e(__('Mollie Profile Id')); ?></label>
                                                                                    <input type="text"
                                                                                           name="mollie_profile_id"
                                                                                           id="mollie_profile_id"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['mollie_profile_id']) || is_null($admin_payment_setting['mollie_profile_id']) ? '' : $admin_payment_setting['mollie_profile_id']); ?>"
                                                                                           placeholder="Mollie Profile Id">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_partner_id"
                                                                                           class="col-form-label"><?php echo e(__('Mollie Partner Id')); ?></label>
                                                                                    <input type="text"
                                                                                           name="mollie_partner_id"
                                                                                           id="mollie_partner_id"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['mollie_partner_id']) || is_null($admin_payment_setting['mollie_partner_id']) ? '' : $admin_payment_setting['mollie_partner_id']); ?>"
                                                                                           placeholder="Mollie Partner Id">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Skrill -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingnine">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapsenine"
                                                                        aria-expanded="false" aria-controls="collapsenine">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Skrill')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_skrill_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_skrill_enabled"
                                                                                   name="is_skrill_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_skrill_enabled']) && $admin_payment_setting['is_skrill_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsenine" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingnine"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="mollie_api_key"
                                                                                           class="col-form-label"><?php echo e(__('Skrill Email')); ?></label>
                                                                                    <input type="email" name="skrill_email"
                                                                                           id="skrill_email" class="form-control"
                                                                                           value="<?php echo e(isset($admin_payment_setting['skrill_email']) ? $admin_payment_setting['skrill_email'] : ''); ?>"
                                                                                           placeholder="<?php echo e(__('Mollie Api Key')); ?>" />
                                                                                    <?php if($errors->has('skrill_email')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                            <?php echo e($errors->first('skrill_email')); ?>

                                                                                        </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- CoinGate -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingten">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseten"
                                                                        aria-expanded="false" aria-controls="collapseten">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('CoinGate')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_coingate_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_coingate_enabled"
                                                                                   name="is_coingate_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_coingate_enabled']) && $admin_payment_setting['is_coingate_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseten" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingten"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="col-form-label"
                                                                               for="coingate_mode"><?php echo e(__('CoinGate Mode')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="coingate_mode"
                                                                                                   value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(!isset($admin_payment_setting['coingate_mode']) || $admin_payment_setting['coingate_mode'] == '' || $admin_payment_setting['coingate_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="coingate_mode"
                                                                                                   value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['coingate_mode']) && $admin_payment_setting['coingate_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="coingate_auth_token"
                                                                                           class="col-form-label"><?php echo e(__('CoinGate Auth Token')); ?></label>
                                                                                    <input type="text"
                                                                                           name="coingate_auth_token"
                                                                                           id="coingate_auth_token"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['coingate_auth_token']) || is_null($admin_payment_setting['coingate_auth_token']) ? '' : $admin_payment_setting['coingate_auth_token']); ?>"
                                                                                           placeholder="CoinGate Auth Token">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- PaymentWall -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingeleven">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseeleven"
                                                                        aria-expanded="false" aria-controls="collapseeleven">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('PaymentWall')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                   name="is_paymentwall_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_paymentwall_enabled"
                                                                                   name="is_paymentwall_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paymentwall_enabled']) && $admin_payment_setting['is_paymentwall_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseeleven" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingeleven"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_public_key"
                                                                                           class="col-form-label"><?php echo e(__('Public Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paymentwall_public_key"
                                                                                           id="paymentwall_public_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['paymentwall_public_key']) || is_null($admin_payment_setting['paymentwall_public_key']) ? '' : $admin_payment_setting['paymentwall_public_key']); ?>"
                                                                                           placeholder="<?php echo e(__('Public Key')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="paymentwall_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Private Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="paymentwall_secret_key"
                                                                                           id="paymentwall_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['paymentwall_secret_key']) || is_null($admin_payment_setting['paymentwall_secret_key']) ? '' : $admin_payment_setting['paymentwall_secret_key']); ?>"
                                                                                           placeholder="<?php echo e(__('Private Key')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Toyyibpay -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingtwelve">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapsetwelve"
                                                                        aria-expanded="false" aria-controls="collapsetwelve">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Toyyibpay')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2">Enable:</span>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden"
                                                                                   name="is_toyyibpay_enabled" value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   id="customswitchv1-1 is_toyyibpay_enabled"
                                                                                   name="is_toyyibpay_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_toyyibpay_enabled']) && $admin_payment_setting['is_toyyibpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapsetwelve" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingtwelve"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="toyyibpay_category_code"
                                                                                           class="col-form-label"><?php echo e(__('Category Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="toyyibpay_category_code"
                                                                                           id="toyyibpay_category_code"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['toyyibpay_category_code']) || is_null($admin_payment_setting['toyyibpay_category_code']) ? '' : $admin_payment_setting['toyyibpay_category_code']); ?>"
                                                                                           placeholder="<?php echo e(__('Category Key')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="input-edits">
                                                                                <div class="form-group">
                                                                                    <label for="toyyibpay_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Secrect Key')); ?></label>
                                                                                    <input type="text"
                                                                                           name="toyyibpay_secret_key"
                                                                                           id="toyyibpay_secret_key"
                                                                                           class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['toyyibpay_secret_key']) || is_null($admin_payment_setting['toyyibpay_secret_key']) ? '' : $admin_payment_setting['toyyibpay_secret_key']); ?>"
                                                                                           placeholder="<?php echo e(__('Secrect Key')); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- PayFast -->
                                                        <div class="accordion accordion-flush setting-accordion" id="accordionExample">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne13"
                                                                            aria-expanded="false" aria-controls="collapseOne13">
                                                                            <span class="d-flex align-items-center">
                                                                                <?php echo e(__('PayFast')); ?>

                                                                            </span>

                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_payfast_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox" class="form-check-input"
                                                                                       name="is_payfast_enabled" id="is_payfast_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_payfast_enabled']) && $admin_payment_setting['is_payfast_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>

                                                                    </button>
                                                                </h2>
                                                                <div id="collapseOne13" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <label class="paypal-label col-form-label"
                                                                                   for="payfast_mode"><?php echo e(__('Payfast Mode')); ?></label>
                                                                            <div class="d-flex">
                                                                                <div class="mr-2" style="margin-right: 15px;">
                                                                                    <div class="border card p-3">
                                                                                        <div class="form-check">
                                                                                            <label
                                                                                                class="form-check-label text-dark <?php echo e(isset($admin_payment_setting['payfast_mode']) && $admin_payment_setting['payfast_mode'] == 'sandbox' ? 'active' : ''); ?>">
                                                                                                <input type="radio" name="payfast_mode"
                                                                                                       value="sandbox" class="form-check-input"
                                                                                                    <?php echo e(isset($admin_payment_setting['payfast_mode']) && $admin_payment_setting['payfast_mode'] == 'sandbox' ? 'checked="checked"' : ''); ?>>

                                                                                                <?php echo e(__('Sandbox')); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mr-2" style="margin-right: 15px;">
                                                                                    <div class="border card p-3">
                                                                                        <div class="form-check">
                                                                                            <label class="form-check-label text-dark">
                                                                                                <input type="radio" name="payfast_mode"
                                                                                                       value="live" class="form-check-input"
                                                                                                    <?php echo e(isset($admin_payment_setting['payfast_mode']) && $admin_payment_setting['payfast_mode'] == 'live' ? 'checked="checked"' : ''); ?>>

                                                                                                <?php echo e(__('Live')); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_public_key"
                                                                                           class="col-form-label"><?php echo e(__('Merchant ID')); ?></label>
                                                                                    <input type="text" name="payfast_merchant_id"
                                                                                           id="payfast_merchant_id" class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['payfast_merchant_id']) || is_null($admin_payment_setting['payfast_merchant_id']) ? '' : $admin_payment_setting['payfast_merchant_id']); ?>"
                                                                                           placeholder="Merchant ID">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="paytm_secret_key"
                                                                                           class="col-form-label"><?php echo e(__('Merchant Key')); ?></label>
                                                                                    <input type="text" name="payfast_merchant_key"
                                                                                           id="payfast_merchant_key" class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['payfast_merchant_key']) || is_null($admin_payment_setting['payfast_merchant_key']) ? '' : $admin_payment_setting['payfast_merchant_key']); ?>"
                                                                                           placeholder="Merchant Key">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="payfast_signature"
                                                                                           class="col-form-label"><?php echo e(__('Salt Passphrase')); ?></label>
                                                                                    <input type="text" name="payfast_signature"
                                                                                           id="payfast_signature" class="form-control"
                                                                                           value="<?php echo e(!isset($admin_payment_setting['payfast_signature']) || is_null($admin_payment_setting['payfast_signature']) ? '' : $admin_payment_setting['payfast_signature']); ?>"
                                                                                           placeholder="Salt Passphrase">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Iyzipay -->
                                                        <div class="accordion accordion-flush setting-accordion" id="accordionExample">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingFourteen">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse14" aria-expanded="false"
                                                                            aria-controls="collapse14">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Iyzipay')); ?>

                                                                </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_iyzipay_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       id="customswitchv1-1 is_iyzipay_enabled"
                                                                                       name="is_iyzipay_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_iyzipay_enabled']) && $admin_payment_setting['is_iyzipay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse14" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingFourteen"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="col-md-12 pb-4">
                                                                            <div class="d-flex">
                                                                                <div class="mr-2" style="margin-right: 15px;">
                                                                                    <div class="border card p-1">
                                                                                        <div class="form-check">
                                                                                            <label
                                                                                                class="form-check-label text-dark">
                                                                                                <input type="radio"
                                                                                                       name="iyzipay_mode"
                                                                                                       value="sandbox"
                                                                                                       class="form-check-input"
                                                                                                    <?php echo e((isset($admin_payment_setting['iyzipay_mode']) && $admin_payment_setting['iyzipay_mode'] == '') || (isset($admin_payment_setting['iyzipay_mode']) && $admin_payment_setting['iyzipay_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                                <?php echo e(__('Sandbox')); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mr-2" style="margin-right: 15px;">
                                                                                    <div class="border card p-1">
                                                                                        <div class="form-check">
                                                                                            <label
                                                                                                class="form-check-label text-dark">
                                                                                                <input type="radio"
                                                                                                       name="iyzipay_mode"
                                                                                                       value="live"
                                                                                                       class="form-check-input"
                                                                                                    <?php echo e(isset($admin_payment_setting['iyzipay_mode']) && $admin_payment_setting['iyzipay_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                                <?php echo e(__('Live')); ?>

                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row gy-4">
                                                                            <div class="col-lg-6">
                                                                                <div class="input-edits">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label"
                                                                                               for="iyzipay_public_key"><?php echo e(__('Public Key')); ?></label>
                                                                                        <input type="text"
                                                                                               name="iyzipay_public_key"
                                                                                               id="iyzipay_public_key"
                                                                                               class="form-control"
                                                                                               value="<?php echo e(!isset($admin_payment_setting['iyzipay_public_key']) || is_null($admin_payment_setting['iyzipay_public_key']) ? '' : $admin_payment_setting['iyzipay_public_key']); ?>"
                                                                                               placeholder="<?php echo e(__('Public Key')); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="input-edits">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label"
                                                                                               for="iyzipay_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                        <input type="text"
                                                                                               name="iyzipay_secret_key"
                                                                                               id="iyzipay_secret_key"
                                                                                               class="form-control"
                                                                                               value="<?php echo e(isset($admin_payment_setting['iyzipay_secret_key']) ? $admin_payment_setting['iyzipay_secret_key'] : ''); ?>"
                                                                                               placeholder="<?php echo e(__('Secret Key')); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- SSPAY -->
                                                        <div class="accordion accordion-flush setting-accordion" id="accordionExample">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingFourteen">
                                                                    <button class="accordion-button collapsed" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse15" aria-expanded="false"
                                                                            aria-controls="collapse15">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('SSPay')); ?>

                                                                </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_sspay_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       id="customswitchv1-1 is_sspay_enabled"
                                                                                       name="is_sspay_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_sspay_enabled']) && $admin_payment_setting['is_sspay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse15" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingFourteen"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row gy-4">
                                                                            <div class="col-lg-6">
                                                                                <div class="input-edits">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label"
                                                                                               for="sspay_category_code"><?php echo e(__('Category Code')); ?></label>
                                                                                        <input type="text"
                                                                                               name="sspay_category_code"
                                                                                               id="sspay_category_code"
                                                                                               class="form-control"
                                                                                               value="<?php echo e(!isset($admin_payment_setting['sspay_category_code']) || is_null($admin_payment_setting['sspay_category_code']) ? '' : $admin_payment_setting['sspay_category_code']); ?>"
                                                                                               placeholder="<?php echo e(__('Category Code')); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="input-edits">
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label"
                                                                                               for="sspay_secret_key"><?php echo e(__('Secret Key')); ?></label>
                                                                                        <input type="text"
                                                                                               name="sspay_secret_key"
                                                                                               id="sspay_secret_key"
                                                                                               class="form-control"
                                                                                               value="<?php echo e(isset($admin_payment_setting['sspay_secret_key']) ? $admin_payment_setting['sspay_secret_key'] : ''); ?>"
                                                                                               placeholder="<?php echo e(__('Secret Key')); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Paytab -->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty">
                                                                <button class="accordion-button collapsed" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwenty"
                                                                        aria-expanded="true" aria-controls="collapseTwenty">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('PayTab')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable:')); ?></span>
                                                                        <div class="form-check form-switch d-inline-block custom-switch-v1">
                                                                            <input type="hidden" name="is_paytab_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                   name="is_paytab_enabled"
                                                                                   id="is_paytab_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paytab_enabled']) && $admin_payment_setting['is_paytab_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="custom-control-label form-label"
                                                                                   for="is_paytab_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwenty" class="accordion-collapse collapse"aria-labelledby="headingTwenty"data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="paytab_profile_id"
                                                                                       class="col-form-label"><?php echo e(__('Profile Id')); ?></label>
                                                                                <input type="text" name="paytab_profile_id"
                                                                                       id="paytab_profile_id" class="form-control"
                                                                                       value="<?php echo e(isset($admin_payment_setting['paytab_profile_id']) ? $admin_payment_setting['paytab_profile_id'] : ''); ?>"
                                                                                       placeholder="<?php echo e(__('Profile Id')); ?>">
                                                                            </div>
                                                                            <?php if($errors->has('paytab_profile_id')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                            <?php echo e($errors->first('paytab_profile_id')); ?>

                                                                        </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="paytab_server_key"
                                                                                       class="col-form-label"><?php echo e(__('Server Key')); ?></label>
                                                                                <input type="text" name="paytab_server_key"
                                                                                       id="paytab_server_key" class="form-control"
                                                                                       value="<?php echo e(isset($admin_payment_setting['paytab_server_key']) ? $admin_payment_setting['paytab_server_key'] : ''); ?>"
                                                                                       placeholder="<?php echo e(__('Server Key')); ?>">
                                                                            </div>
                                                                            <?php if($errors->has('paytab_server_key')): ?>
                                                                                <span class="invalid-feedback d-block">
                                                                            <?php echo e($errors->first('paytab_server_key')); ?>

                                                                        </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="paytab_region"
                                                                                       class="form-label"><?php echo e(__('Region')); ?></label>
                                                                                <input type="text" name="paytab_region"
                                                                                       id="paytab_region"
                                                                                       class="form-control form-control-label"
                                                                                       value="<?php echo e(isset($admin_payment_setting['paytab_region']) ? $admin_payment_setting['paytab_region'] : ''); ?>"
                                                                                       placeholder="<?php echo e(__('Region')); ?>" /><br>
                                                                                <?php if($errors->has('paytab_region')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                <?php echo e($errors->first('paytab_region')); ?>

                                                                            </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Benefit----->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentyOne">
                                                                <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyOne"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwentyOne">
                                                            <span class="d-flex align-items-center">
                                                                <?php echo e(__('Benefit')); ?>

                                                            </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_benefit_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input input-primary" name="is_benefit_enabled" id="is_benefit_enabled" <?php echo e(isset($admin_payment_setting['is_benefit_enabled']) && $admin_payment_setting['is_benefit_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                   for="is_benefit_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyOne"
                                                                 class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwentyOne"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">

                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('benefit_api_key', __('Benefit Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('benefit_api_key', isset($admin_payment_setting['benefit_api_key']) ? $admin_payment_setting['benefit_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Benefit Key')])); ?>

                                                                                <?php $__errorArgs = ['benefit_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-benefit_api_key" role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('benefit_secret_key', __('Benefit Secret Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('benefit_secret_key', isset($admin_payment_setting['benefit_secret_key']) ? $admin_payment_setting['benefit_secret_key'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Benefit Secret key')])); ?>

                                                                                <?php $__errorArgs = ['benefit_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-benefit_secret_key"
                                                                                      role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Cashfree----->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwentyTwo">
                                                                <button class="accordion-button collapsed"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyTwo"
                                                                        aria-expanded="false"
                                                                        aria-controls="collapseTwentyTwo">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Cashfree')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_cashfree_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input input-primary" name="is_cashfree_enabled" id="is_cashfree_enabled" <?php echo e(isset($admin_payment_setting['is_cashfree_enabled']) && $admin_payment_setting['is_cashfree_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                   for="is_cashfree_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyTwo"
                                                                 class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwentyTwo"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row gy-4">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('cashfree_api_key', __('Cashfree Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('cashfree_api_key', isset($admin_payment_setting['cashfree_api_key']) ? $admin_payment_setting['cashfree_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Cashfree Key')])); ?>

                                                                                <?php $__errorArgs = ['cashfree_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-cashfree_api_key" role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('cashfree_secret_key', __('Cashfree Secret Key'), ['class' => 'col-form-label'])); ?>

                                                                                <?php echo e(Form::text('cashfree_secret_key', isset($admin_payment_setting['cashfree_secret_key']) ? $admin_payment_setting['cashfree_secret_key'] : '', ['class' => 'form-control ', 'placeholder' => __('Enter Cashfree Secret key')])); ?>

                                                                                <?php $__errorArgs = ['cashfree_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-cashfree_secret_key"
                                                                                      role="alert">
                                                                                <strong
                                                                                    class="text-danger"><?php echo e($message); ?></strong>
                                                                            </span>
                                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Aamarpay----->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty-One">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwenty-One"
                                                                        aria-expanded="true" aria-controls="collapseTwenty-One">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Aamarpay')); ?>

                                                                    </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="me-2"><?php echo e(__('Enable')); ?>:</span>
                                                                        <div
                                                                            class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_aamarpay_enabled" value="off">
                                                                            <input type="checkbox" class="form-check-input input-primary" name="is_aamarpay_enabled" id="is_aamarpay_enabled" <?php echo e(isset($admin_payment_setting['is_aamarpay_enabled']) && $admin_payment_setting['is_aamarpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            <label class="form-check-label"
                                                                                   for="is_aamarpay_enabled"></label>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwenty-One" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwenty-One" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_store_id', __('Store Id'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_store_id', isset($admin_payment_setting['aamarpay_store_id']) ? $admin_payment_setting['aamarpay_store_id'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Store Id')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_store_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('aamarpay_store_id')); ?>

                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_signature_key', __('Signature Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_signature_key', isset($admin_payment_setting['aamarpay_signature_key']) ? $admin_payment_setting['aamarpay_signature_key'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Signature Key')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_signature_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('aamarpay_signature_key')); ?>

                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('aamarpay_description', __('Description'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('aamarpay_description', isset($admin_payment_setting['aamarpay_description']) ? $admin_payment_setting['aamarpay_description'] : '', ['class' => 'form-control', 'placeholder' => __('Enter Description')])); ?><br>
                                                                                <?php if($errors->has('aamarpay_description')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                        <?php echo e($errors->first('aamarpay_description')); ?>

                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--PayTR----->
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty-Two">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyfive"
                                                                        aria-expanded="true" aria-controls="collapseTwentyfive">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('PayTR')); ?>

                                                                </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="form-check-label m-1"
                                                                               for="is_paytr_enabled"><?php echo e(__('Enable')); ?></label>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_paytr_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   name="is_paytr_enabled"
                                                                                   id="is_paytr_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_paytr_enabled']) && $admin_payment_setting['is_paytr_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyfive" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwenty-Two"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('paytr_merchant_id', __('Merchant Id'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('paytr_merchant_id', isset($admin_payment_setting['paytr_merchant_id']) ? $admin_payment_setting['paytr_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                                <?php if($errors->has('paytr_merchant_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_id')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('paytr_merchant_key', __('Merchant Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('paytr_merchant_key', isset($admin_payment_setting['paytr_merchant_key']) ? $admin_payment_setting['paytr_merchant_key'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Key')])); ?><br>
                                                                                <?php if($errors->has('paytr_merchant_key')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_key')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('paytr_merchant_salt', __('Merchant Salt'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('paytr_merchant_salt', isset($admin_payment_setting['paytr_merchant_salt']) ? $admin_payment_setting['paytr_merchant_salt'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Salt')])); ?><br>
                                                                                <?php if($errors->has('paytr_merchant_salt')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('paytr_merchant_salt')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                         <!--Yookassa----->
                                                         <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty-Three">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentysix"
                                                                        aria-expanded="true" aria-controls="collapseTwentysix">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Yookassa')); ?>

                                                                </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="form-check-label m-1"
                                                                               for="is_yookassa_enabled"><?php echo e(__('Enable')); ?></label>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_yookassa_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   name="is_yookassa_enabled"
                                                                                   id="is_yookassa_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_yookassa_enabled']) && $admin_payment_setting['is_yookassa_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentysix" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwenty-Three"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('yookassa_shop_id', __('Shop ID Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('yookassa_shop_id', isset($admin_payment_setting['yookassa_shop_id']) ? $admin_payment_setting['yookassa_shop_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                                <?php if($errors->has('yookassa_shop_id')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('yookassa_shop_id')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('yookassa_secret', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('yookassa_secret', isset($admin_payment_setting['yookassa_secret']) ? $admin_payment_setting['yookassa_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Key')])); ?><br>
                                                                                <?php if($errors->has('yookassa_secret')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('yookassa_secret')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                          <!--Midtrans----->
                                                          <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty-four">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyseven"
                                                                        aria-expanded="true" aria-controls="collapseTwentyseven">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Midtrans')); ?>

                                                                </span>
                                                                
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="form-check-label m-1"
                                                                               for="is_midtrans_enabled"><?php echo e(__('Enable')); ?></label>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_midtrans_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   name="is_midtrans_enabled"
                                                                                   id="is_midtrans_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_midtrans_enabled']) && $admin_payment_setting['is_midtrans_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyseven" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwenty-four"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="col-md-12 pb-4">
                                                                        <label class="midtrans-label col-form-label"
                                                                               for="midtrans_mode"><?php echo e(__('Midtrans Mode')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="midtrans_mode"
                                                                                                   value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e((isset($admin_payment_setting['midtrans_mode']) && $admin_payment_setting['midtrans_mode'] == '') || (isset($admin_payment_setting['midtrans_mode']) && $admin_payment_setting['midtrans_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label
                                                                                            class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="midtrans_mode"
                                                                                                   value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['midtrans_mode']) && $admin_payment_setting['midtrans_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('midtrans_secret', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('midtrans_secret', isset($admin_payment_setting['midtrans_secret']) ? $admin_payment_setting['midtrans_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                                <?php if($errors->has('midtrans_secret')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('midtrans_secret')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                           <!--Xendit----->
                                                           <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingTwenty-five">
                                                                <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapseTwentyeight"
                                                                        aria-expanded="true" aria-controls="collapseTwentyeight">
                                                                <span class="d-flex align-items-center">
                                                                    <?php echo e(__('Xendit')); ?>

                                                                </span>
                                                                    <div class="d-flex align-items-center">
                                                                        <label class="form-check-label m-1"
                                                                               for="is_xendit_enabled"><?php echo e(__('Enable')); ?></label>
                                                                        <div class="form-check form-switch custom-switch-v1">
                                                                            <input type="hidden" name="is_xendit_enabled"
                                                                                   value="off">
                                                                            <input type="checkbox"
                                                                                   class="form-check-input input-primary"
                                                                                   name="is_xendit_enabled"
                                                                                   id="is_xendit_enabled"
                                                                                <?php echo e(isset($admin_payment_setting['is_xendit_enabled']) && $admin_payment_setting['is_xendit_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                        </div>
                                                                    </div>
                                                                </button>
                                                            </h2>
                                                            <div id="collapseTwentyeight" class="accordion-collapse collapse"
                                                                 aria-labelledby="headingTwenty-five"
                                                                 data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="row pt-2">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('xendit_api', __('API Key'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('xendit_api', isset($admin_payment_setting['xendit_api']) ? $admin_payment_setting['xendit_api'] : '', ['class' => 'form-control', 'placeholder' => __('API Key')])); ?><br>
                                                                                <?php if($errors->has('xendit_api')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('xendit_api')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <?php echo e(Form::label('xendit_token', __('Token'), ['class' => 'form-label'])); ?>

                                                                                <?php echo e(Form::text('xendit_token', isset($admin_payment_setting['xendit_token']) ? $admin_payment_setting['xendit_token'] : '', ['class' => 'form-control', 'placeholder' => __('Token')])); ?><br>
                                                                                <?php if($errors->has('xendit_token')): ?>
                                                                                    <span class="invalid-feedback d-block">
                                                                                    <?php echo e($errors->first('xendit_token')); ?>

                                                                                </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-six">
                                                                    <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseTwentnine"
                                                                            aria-expanded="true" aria-controls="collapseTwentnine">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Nepalste')); ?>

                                                                    </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                   for="is_nepalste_enabled"><?php echo e(__('Enable')); ?></label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_nepalste_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       name="is_nepalste_enabled"
                                                                                       id="is_nepalste_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_nepalste_enabled']) && $admin_payment_setting['is_nepalste_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseTwentnine" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingTwenty-six"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="nepalste_mode" value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e((isset($admin_payment_setting['nepalste_mode']) && $admin_payment_setting['nepalste_mode'] == '') || (isset($admin_payment_setting['nepalste_mode']) && $admin_payment_setting['nepalste_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="nepalste_mode" value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['nepalste_mode']) && $admin_payment_setting['nepalste_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('nepalste_public_key', __('Public Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('nepalste_public_key', isset($admin_payment_setting['nepalste_public_key']) ? $admin_payment_setting['nepalste_public_key'] : '', ['class' => 'form-control', 'placeholder' => __('API Key')])); ?><br>
                                                                                    <?php if($errors->has('nepalste_public_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('nepalste_public_key')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('nepalste_secret_key', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('nepalste_secret_key', isset($admin_payment_setting['nepalste_secret_key']) ? $admin_payment_setting['nepalste_secret_key'] : '', ['class' => 'form-control', 'placeholder' => __('Token')])); ?><br>
                                                                                    <?php if($errors->has('nepalste_secret_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('nepalste_secret_key')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-seven">
                                                                    <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseThirty"
                                                                            aria-expanded="true" aria-controls="collapseThirty">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Paiement Pro')); ?>

                                                                    </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                   for="is_paiementpro_enabled"><?php echo e(__('Enable')); ?></label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_paiementpro_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       name="is_paiementpro_enabled"
                                                                                       id="is_paiementpro_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_paiementpro_enabled']) && $admin_payment_setting['is_paiementpro_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThirty" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingTwenty-six"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('paiementpro_merchant_id', __('Merchant Id'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('paiementpro_merchant_id', isset($admin_payment_setting['paiementpro_merchant_id']) ? $admin_payment_setting['paiementpro_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Id')])); ?><br>
                                                                                    <?php if($errors->has('paiementpro_merchant_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('paiementpro_merchant_id')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-eight">
                                                                    <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseThirty-one"
                                                                            aria-expanded="true" aria-controls="collapseThirty-one">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Cinetpay')); ?>

                                                                    </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                   for="is_cinetpay_enabled"><?php echo e(__('Enable')); ?></label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_cinetpay_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       name="is_cinetpay_enabled"
                                                                                       id="is_cinetpay_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_cinetpay_enabled']) && $admin_payment_setting['is_cinetpay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThirty-one" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingTwenty-six"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row pt-2">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('cinetpay_api_key', __('CinetPay API Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('cinetpay_api_key', isset($admin_payment_setting['cinetpay_api_key']) ? $admin_payment_setting['cinetpay_api_key'] : '', ['class' => 'form-control', 'placeholder' => __('CinetPay API Key')])); ?><br>
                                                                                    <?php if($errors->has('cinetpay_api_key')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('cinetpay_api_key')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>   
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('cinetpay_site_id', __('CinetPay Site ID'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('cinetpay_site_id', isset($admin_payment_setting['cinetpay_site_id']) ? $admin_payment_setting['cinetpay_site_id'] : '', ['class' => 'form-control', 'placeholder' => __('CinetPay Site ID')])); ?><br>
                                                                                    <?php if($errors->has('cinetpay_site_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('cinetpay_site_id')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>                                                                             
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingTwenty-nine">
                                                                    <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseThirty-two"
                                                                            aria-expanded="true" aria-controls="collapseThirty-two">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('Fedapay')); ?>

                                                                    </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                 for="is_fedapay_enabled"><?php echo e(__('Enable')); ?></label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_fedapay_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       name="is_fedapay_enabled"
                                                                                       id="is_fedapay_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_fedapay_enabled']) && $admin_payment_setting['is_fedapay_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThirty-two" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingTwenty-six"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex">
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="fedapay_mode" value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e((isset($admin_payment_setting['fedapay_mode']) && $admin_payment_setting['fedapay_mode'] == '') || (isset($admin_payment_setting['fedapay_mode']) && $admin_payment_setting['fedapay_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="fedapay_mode" value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['fedapay_mode']) && $admin_payment_setting['fedapay_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('fedapay_public', __('Public Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('fedapay_public', isset($admin_payment_setting['fedapay_public']) ? $admin_payment_setting['fedapay_public'] : '', ['class' => 'form-control', 'placeholder' => __('Public Key')])); ?><br>
                                                                                    <?php if($errors->has('fedapay_public')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('fedapay_public')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>   
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('fedapay_secret', __('Secret Key'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('fedapay_secret', isset($admin_payment_setting['fedapay_secret']) ? $admin_payment_setting['fedapay_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Secret Key')])); ?><br>
                                                                                    <?php if($errors->has('fedapay_secret')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('fedapay_secret')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>                                                                             
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingThirty">
                                                                    <button class="accordion-button" type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapseThirty-three"
                                                                            aria-expanded="true" aria-controls="collapseThirty-three">
                                                                    <span class="d-flex align-items-center">
                                                                        <?php echo e(__('PayHere')); ?>

                                                                    </span>
                                                                        <div class="d-flex align-items-center">
                                                                            <label class="form-check-label m-1"
                                                                                 for="is_payhere_enabled"><?php echo e(__('Enable')); ?></label>
                                                                            <div class="form-check form-switch custom-switch-v1">
                                                                                <input type="hidden" name="is_payhere_enabled"
                                                                                       value="off">
                                                                                <input type="checkbox"
                                                                                       class="form-check-input input-primary"
                                                                                       name="is_payhere_enabled"
                                                                                       id="is_payhere_enabled"
                                                                                    <?php echo e(isset($admin_payment_setting['is_payhere_enabled']) && $admin_payment_setting['is_payhere_enabled'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                                            </div>
                                                                        </div>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapseThirty-three" class="accordion-collapse collapse"
                                                                     aria-labelledby="headingTwenty-six"
                                                                     data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">                                                                 
                                                                    <label class="payhere-label col-form-label"
                                                                               for="payhere_mode"><?php echo e(__('PayHere Environment')); ?></label>
                                                                        <br>
                                                                        <div class="d-flex">                                                                           
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="payhere_mode" value="sandbox"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e((isset($admin_payment_setting['payhere_mode']) && $admin_payment_setting['payhere_mode'] == '') || (isset($admin_payment_setting['payhere_mode']) && $admin_payment_setting['payhere_mode'] == 'sandbox') ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Sandbox')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mr-2" style="margin-right: 15px;">
                                                                                <div class="border card p-1">
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label text-dark">
                                                                                            <input type="radio"
                                                                                                   name="payhere_mode" value="live"
                                                                                                   class="form-check-input"
                                                                                                <?php echo e(isset($admin_payment_setting['payhere_mode']) && $admin_payment_setting['payhere_mode'] == 'live' ? 'checked="checked"' : ''); ?>>
                                                                                            <?php echo e(__('Live')); ?>

                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row pt-2">                                                                            
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('payhere_merchant_id', __('Merchant ID'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('payhere_merchant_id', isset($admin_payment_setting['payhere_merchant_id']) ? $admin_payment_setting['payhere_merchant_id'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant ID')])); ?><br>
                                                                                    <?php if($errors->has('payhere_merchant_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payhere_merchant_id')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>   
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('payhere_merchant_secret', __('Merchant Secret'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('payhere_merchant_secret', isset($admin_payment_setting['payhere_merchant_secret']) ? $admin_payment_setting['payhere_merchant_secret'] : '', ['class' => 'form-control', 'placeholder' => __('Merchant Secret')])); ?><br>
                                                                                    <?php if($errors->has('payhere_merchant_secret')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payhere_merchant_secret')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>     
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('payhere_app_id', __('App ID'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('payhere_app_id', isset($admin_payment_setting['payhere_app_id']) ? $admin_payment_setting['payhere_app_id'] : '', ['class' => 'form-control', 'placeholder' => __('App ID')])); ?><br>
                                                                                    <?php if($errors->has('payhere_app_id')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payhere_app_id')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>     
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::label('payhere_app_secret', __('App Secret'), ['class' => 'form-label'])); ?>

                                                                                    <?php echo e(Form::text('payhere_app_secret', isset($admin_payment_setting['payhere_app_secret']) ? $admin_payment_setting['payhere_app_secret'] : '', ['class' => 'form-control', 'placeholder' => __('App Secret')])); ?><br>
                                                                                    <?php if($errors->has('payhere_app_secret')): ?>
                                                                                        <span class="invalid-feedback d-block">
                                                                                        <?php echo e($errors->first('payhere_app_secret')); ?>

                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                </div>
                                                                            </div>                                                                             
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn-submit btn btn-primary" type="submit">
                                    <?php echo e(__('Save Changes')); ?>

                                </button>
                            </div>
                        </form>
                    </div>

                    <!--Pusher Settings-->
                    <div id="pusher-settings" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Pusher Settings')); ?></h5>
                        </div>
                        <?php echo e(Form::model($settings,array('route'=>'pusher.setting','method'=>'post'))); ?>

                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pusher_app_id',__('Pusher App Id'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('pusher_app_id',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['pusher_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-pusher_app_id" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pusher_app_key',__('Pusher App Key'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('pusher_app_key',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['pusher_app_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-pusher_app_key" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pusher_app_secret',__('Pusher App Secret'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('pusher_app_secret',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['pusher_app_secret'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-pusher_app_secret" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('pusher_app_cluster',__('Pusher App Cluster'),array('class'=>'form-label'))); ?>

                                        <?php echo e(Form::text('pusher_app_cluster',null,array('class'=>'form-control font-style'))); ?>

                                        <?php $__errorArgs = ['pusher_app_cluster'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-pusher_app_cluster" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="form-group">
                                <input class="btn btn-print-invoice  btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <!--ReCaptcha Settings-->                   
                    <div id="recaptcha_settings" class="card">
                        <form method="POST" action="<?php echo e(route('recaptcha.settings.store')); ?>" accept-charset="UTF-8">
                            <?php echo csrf_field(); ?>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="mb-2"><?php echo e(__('ReCaptcha Settings')); ?></h5>
                                        <a href="https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/"
                                           target="_blank" class="text-dark">
                                            <small>(<?php echo e(__('How to Get Google reCaptcha Site and Secret key')); ?>)</small>
                                        </a>
                                    </div>
                                    <div class="col switch-width text-end">
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" class="" name="recaptcha_module"
                                                       id="recaptcha_module"  <?php echo e(!empty($setting['recaptcha_module']) && $setting['recaptcha_module'] == 'on' ? 'checked="checked"' : ''); ?>>
                                                <label class="custom-control-label" for="recaptcha_module"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group col switch-width">
                                            <?php echo e(Form::label('google_recaptcha_version', __('Google Recaptcha Version'), ['class' => ' col-form-label'])); ?>

                        
                                            <?php echo e(Form::select('google_recaptcha_version', $google_recaptcha_version, isset($setting['google_recaptcha_version']) ? $setting['google_recaptcha_version'] : 'v2-checkbox', ['id' => 'google_recaptcha_version', 'class' => 'form-control choices', 'searchEnabled' => 'true'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="google_recaptcha_key" class="form-label"><?php echo e(__('Google Recaptcha Key')); ?></label>
                                            <input class="form-control" placeholder="<?php echo e(__('Enter Google Recaptcha Key')); ?>" name="google_recaptcha_key" type="text" value="<?php echo e(!empty($setting['google_recaptcha_key']) ? $setting['google_recaptcha_key'] : ''); ?>" id="google_recaptcha_key" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="google_recaptcha_secret" class="form-label"><?php echo e(__('Google Recaptcha Secret')); ?></label>
                                            <input class="form-control" placeholder="<?php echo e(__('Enter Google Recaptcha Secret')); ?>" name="google_recaptcha_secret" type="text" value="<?php echo e(!empty($setting['google_recaptcha_secret']) ? $setting['google_recaptcha_secret'] : ''); ?>" id="google_recaptcha_secret" required>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <div class="form-group">
                                    <input class="btn btn-print-invoice btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <!-- Storage Settings -->
                    <div id="storage-settings" class="card mb-3">
                        <?php echo e(Form::open(array('route' => 'storage.setting.store', 'enctype' => "multipart/form-data"))); ?>

                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <h5 class=""><?php echo e(__('Storage Settings')); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="local-outlined" autocomplete="off" <?php echo e($setting['storage_setting'] == 'local'?'checked':''); ?> value="local" checked>
                                    <label class="btn btn-outline-primary" for="local-outlined"><?php echo e(__('Local')); ?></label>
                                </div>
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="s3-outlined" autocomplete="off" <?php echo e($setting['storage_setting']=='s3'?'checked':''); ?>  value="s3">
                                    <label class="btn btn-outline-primary" for="s3-outlined"> <?php echo e(__('AWS S3')); ?></label>
                                </div>
                                <div  class="pe-2">
                                    <input type="radio" class="btn-check" name="storage_setting" id="wasabi-outlined" autocomplete="off" <?php echo e($setting['storage_setting']=='wasabi'?'checked':''); ?> value="wasabi">
                                    <label class="btn btn-outline-primary" for="wasabi-outlined"><?php echo e(__('Wasabi')); ?></label>
                                </div>
                            </div>
                            <div  class="mt-2">
                                <div class="local-setting row <?php echo e($setting['storage_setting']=='local'?' ':'d-none'); ?>">
                                    <div class="form-group col-8 switch-width">
                                        <?php echo e(Form::label('local_storage_validation',__('Only Upload Files'),array('class'=>' form-label'))); ?>

                                        <select name="local_storage_validation[]" class="select2"  id="local_storage_validation"  multiple>
                                            <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if(in_array($f, $local_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" for="local_storage_max_upload_size"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                            <input type="number" name="local_storage_max_upload_size" class="form-control" value="<?php echo e((!isset($setting['local_storage_max_upload_size']) || is_null($setting['local_storage_max_upload_size'])) ? '' : $setting['local_storage_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="s3-setting row <?php echo e($setting['storage_setting']=='s3'?' ':'d-none'); ?>">
                                    <div class=" row ">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_key"><?php echo e(__('S3 Key')); ?></label>
                                                <input type="text" name="s3_key" class="form-control" value="<?php echo e((!isset($setting['s3_key']) || is_null($setting['s3_key'])) ? '' : $setting['s3_key']); ?>" placeholder="<?php echo e(__('S3 Key')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_secret"><?php echo e(__('S3 Secret')); ?></label>
                                                <input type="text" name="s3_secret" class="form-control" value="<?php echo e((!isset($setting['s3_secret']) || is_null($setting['s3_secret'])) ? '' : $setting['s3_secret']); ?>" placeholder="<?php echo e(__('S3 Secret')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_region"><?php echo e(__('S3 Region')); ?></label>
                                                <input type="text" name="s3_region" class="form-control" value="<?php echo e((!isset($setting['s3_region']) || is_null($setting['s3_region'])) ? '' : $setting['s3_region']); ?>" placeholder="<?php echo e(__('S3 Region')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_bucket"><?php echo e(__('S3 Bucket')); ?></label>
                                                <input type="text" name="s3_bucket" class="form-control" value="<?php echo e((!isset($setting['s3_bucket']) || is_null($setting['s3_bucket'])) ? '' : $setting['s3_bucket']); ?>" placeholder="<?php echo e(__('S3 Bucket')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_url"><?php echo e(__('S3 URL')); ?></label>
                                                <input type="text" name="s3_url" class="form-control" value="<?php echo e((!isset($setting['s3_url']) || is_null($setting['s3_url'])) ? '' : $setting['s3_url']); ?>" placeholder="<?php echo e(__('S3 URL')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_endpoint"><?php echo e(__('S3 Endpoint')); ?></label>
                                                <input type="text" name="s3_endpoint" class="form-control" value="<?php echo e((!isset($setting['s3_endpoint']) || is_null($setting['s3_endpoint'])) ? '' : $setting['s3_endpoint']); ?>" placeholder="<?php echo e(__('S3 Endpoint')); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-8 switch-width">
                                            <?php echo e(Form::label('s3_storage_validation',__('Only Upload Files'),array('class'=>' form-label'))); ?>

                                            <select name="s3_storage_validation[]" class="select2" id="s3_storage_validation" multiple>
                                                <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($f, $s3_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_max_upload_size"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                <input type="number" name="s3_max_upload_size" class="form-control" value="<?php echo e((!isset($setting['s3_max_upload_size']) || is_null($setting['s3_max_upload_size'])) ? '' : $setting['s3_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="wasabi-setting row <?php echo e($setting['storage_setting']=='wasabi'?' ':'d-none'); ?>">
                                    <div class=" row ">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_key"><?php echo e(__('Wasabi Key')); ?></label>
                                                <input type="text" name="wasabi_key" class="form-control" value="<?php echo e((!isset($setting['wasabi_key']) || is_null($setting['wasabi_key'])) ? '' : $setting['wasabi_key']); ?>" placeholder="<?php echo e(__('Wasabi Key')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_secret"><?php echo e(__('Wasabi Secret')); ?></label>
                                                <input type="text" name="wasabi_secret" class="form-control" value="<?php echo e((!isset($setting['wasabi_secret']) || is_null($setting['wasabi_secret'])) ? '' : $setting['wasabi_secret']); ?>" placeholder="<?php echo e(__('Wasabi Secret')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="s3_region"><?php echo e(__('Wasabi Region')); ?></label>
                                                <input type="text" name="wasabi_region" class="form-control" value="<?php echo e((!isset($setting['wasabi_region']) || is_null($setting['wasabi_region'])) ? '' : $setting['wasabi_region']); ?>" placeholder="<?php echo e(__('Wasabi Region')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="wasabi_bucket"><?php echo e(__('Wasabi Bucket')); ?></label>
                                                <input type="text" name="wasabi_bucket" class="form-control" value="<?php echo e((!isset($setting['wasabi_bucket']) || is_null($setting['wasabi_bucket'])) ? '' : $setting['wasabi_bucket']); ?>" placeholder="<?php echo e(__('Wasabi Bucket')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="wasabi_url"><?php echo e(__('Wasabi URL')); ?></label>
                                                <input type="text" name="wasabi_url" class="form-control" value="<?php echo e((!isset($setting['wasabi_url']) || is_null($setting['wasabi_url'])) ? '' : $setting['wasabi_url']); ?>" placeholder="<?php echo e(__('Wasabi URL')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="wasabi_root"><?php echo e(__('Wasabi Root')); ?></label>
                                                <input type="text" name="wasabi_root" class="form-control" value="<?php echo e((!isset($setting['wasabi_root']) || is_null($setting['wasabi_root'])) ? '' : $setting['wasabi_root']); ?>" placeholder="<?php echo e(__('Wasabi Root')); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group col-8 switch-width">
                                            <?php echo e(Form::label('wasabi_storage_validation',__('Only Upload Files'),array('class'=>'form-label'))); ?>


                                            <select name="wasabi_storage_validation[]" class="select2" id="wasabi_storage_validation" multiple>
                                                <?php $__currentLoopData = $file_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if(in_array($f, $wasabi_storage_validations)): ?> selected <?php endif; ?>><?php echo e($f); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="wasabi_root"><?php echo e(__('Max upload size ( In KB)')); ?></label>
                                                <input type="number" name="wasabi_max_upload_size" class="form-control" value="<?php echo e((!isset($setting['wasabi_max_upload_size']) || is_null($setting['wasabi_max_upload_size'])) ? '' : $setting['wasabi_max_upload_size']); ?>" placeholder="<?php echo e(__('Max upload size')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <input class="btn btn-print-invoice  btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    
                    <div id="seo-settings" class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5><?php echo e(__('SEO Settings')); ?></h5>
                            <?php
                                $settings = \App\Models\Utility::settings();
                            ?>
                            <?php if(!empty($settings['chat_gpt_key'])): ?>
                            <div class="d-flex justify-content-end">
                                <div class="mt-0">
                                    <a data-size="md" class="btn btn-primary text-white btn-sm" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['seo'])); ?>"
                                       data-bs-placement="top" data-title="<?php echo e(__('Generate content with AI')); ?>">
                                        <i class="fas fa-robot"></i> <span><?php echo e(__('Generate with AI')); ?></span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php echo e(Form::open(['url' => route('seo.settings.store'), 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('Meta Keywords', __('Meta Keywords'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('meta_title', !empty($setting['meta_title']) ? $setting['meta_title'] : '', ['class' => 'form-control ', 'placeholder' => 'Meta Keywords'])); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::label('Meta Description', __('Meta Description'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::textarea('meta_desc', !empty($setting['meta_desc']) ? $setting['meta_desc'] : '', ['class' => 'form-control ', 'placeholder' => 'Meta Description','rows'=>7])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                    <?php echo e(Form::label('Meta Image', __('Meta Image'), ['class' => 'col-form-label'])); ?>

                                    </div>
                                    <div class="setting-card">
                                        <div class="logo-content">
                                            <img id="image2" src="<?php echo e($meta_image . '/' . (isset($setting['meta_image']) && !empty($setting['meta_image']) ? $setting['meta_image'] : 'default.png')); ?>"
                                                 class="img_setting seo_image">
                                        </div>
                                        <div class="choose-files mt-4">
                                            <label for="meta_image">
                                                <div class="bg-primary company_favicon_update"> <i
                                                        class="ti ti-upload px-1"></i><?php echo e(__('Choose file here')); ?>

                                                </div>
                                                <input type="file" class="form-control file"  id="meta_image" name="meta_image"
                                                       data-filename="meta_image">
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['meta_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="row">
                                            <span class="invalid-logo" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <input class="btn btn-print-invoice btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    
                    <div class="card" id="cookie-settings">

                        <?php echo e(Form::model($settings,array('route'=>'cookie.setting','method'=>'post'))); ?>

                        <div class="card-header flex-column flex-lg-row d-flex align-items-lg-center gap-2 justify-content-between">
                            <h5><?php echo e(__('Cookie Settings')); ?></h5>
                            <div class="d-flex align-items-center">
                                <?php echo e(Form::label('enable_cookie', __('Enable cookie'), ['class' => 'col-form-label p-0 fw-bold me-3'])); ?>

                                <div class="custom-control custom-switch me-2"  onclick="enablecookie()">
                                    <input type="checkbox" data-toggle="switchbutton" data-onstyle="primary" name="enable_cookie" class="form-check-input input-primary "
                                           id="enable_cookie" <?php echo e($settings['enable_cookie'] == 'on' ? ' checked ' : ''); ?> >
                                    <label class="custom-control-label mb-1" for="enable_cookie"></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body cookieDiv <?php echo e($settings['enable_cookie'] == 'off' ? 'disabledCookie ' : ''); ?>">
                            <?php
                                $settings = \App\Models\Utility::settings();
                            ?>
                            <div class="row">
                                <div class="text-end">
                                    <?php if(!empty($settings['chat_gpt_key'])): ?>
                                        <div class="mt-0">
                                            <a data-size="md" class="btn btn-primary text-white btn-sm" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['cookie'])); ?>"
                                               data-bs-placement="top" data-title="<?php echo e(__('Generate content with AI')); ?>">
                                                <i class="fas fa-robot"></i> <span><?php echo e(__('Generate with AI')); ?></span>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-check form-switch custom-switch-v1" id="cookie_log">
                                        <input type="checkbox" name="cookie_logging" class="form-check-input input-primary cookie_setting"
                                               id="cookie_logging" <?php echo e($settings['cookie_logging'] == 'on' ? ' checked ' : ''); ?>>
                                        <label class="form-check-label" for="cookie_logging"><?php echo e(__('Enable logging')); ?></label>
                                    </div>
                                    <div class="form-group" >
                                        <?php echo e(Form::label('cookie_title', __('Cookie Title'), ['class' => 'col-form-label' ])); ?>

                                        <?php echo e(Form::text('cookie_title', null, ['class' => 'form-control cookie_setting'] )); ?>

                                    </div>
                                    <div class="form-group ">
                                        <?php echo e(Form::label('cookie_description', __('Cookie Description'), ['class' => ' form-label'])); ?>

                                        <?php echo Form::textarea('cookie_description', null, ['class' => 'form-control cookie_setting', 'rows' => '3']); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch custom-switch-v1 ">
                                        <input type="checkbox" name="necessary_cookies" class="form-check-input input-primary"
                                               id="necessary_cookies" checked onclick="return false">
                                        <label class="form-check-label" for="necessary_cookies"><?php echo e(__('Strictly necessary cookies')); ?></label>
                                    </div>
                                    <div class="form-group ">
                                        <?php echo e(Form::label('strictly_cookie_title', __(' Strictly Cookie Title'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('strictly_cookie_title', null, ['class' => 'form-control cookie_setting'])); ?>

                                    </div>
                                    <div class="form-group ">
                                        <?php echo e(Form::label('strictly_cookie_description', __('Strictly Cookie Description'), ['class' => ' form-label'])); ?>

                                        <?php echo Form::textarea('strictly_cookie_description', null, ['class' => 'form-control cookie_setting ', 'rows' => '3']); ?>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <h5><?php echo e(__('More Information')); ?></h5>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('more_information_description', __('Contact Us Description'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('more_information_description', null, ['class' => 'form-control cookie_setting'])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <?php echo e(Form::label('contactus_url', __('Contact Us URL'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('contactus_url', null, ['class' => 'form-control cookie_setting'])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <?php if(isset($settings['cookie_logging']) && $settings['cookie_logging'] == 'on'): ?>
                                        <label for="file" class="form-label"><?php echo e(__('Download cookie accepted data')); ?></label>
                                        <a href="<?php echo e(asset(Storage::url('uploads/sample')) . '/data.csv'); ?>" class="btn btn-primary mr-3">
                                            <i class="ti ti-download"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-6 text-end ">
                                    <input class="btn btn-print-invoice btn-primary cookie_btn" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    
                    <div class="card" id="cache-settings">
                        <div class="card-header">
                            <h5><?php echo e('Cache Settings'); ?></h5>
                            <small class="text-secondary font-weight-bold">
                                <?php echo e(__("This is a page meant for more advanced users, simply ignore it if you don't understand what cache is.")); ?>

                            </small>
                        </div>
                        <form method="POST" action="<?php echo e(route('cache.settings.store')); ?>" accept-charset="UTF-8">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <?php echo e(Form::label('Current cache size', __('Current cache size'), ['class' => 'col-form-label'])); ?>

                                        <div class="input-group mb-5">
                                            <input type="text" class="form-control" value="<?php echo e($file_size); ?>" readonly >
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon6"><?php echo e(__('MB')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-print-invoice btn-primary m-r-10" type="submit" value="<?php echo e(__('Cache Clear')); ?>">
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    
                    <div id="chat-gpt-settings" class="card">
                        <div class="card-header">
                            <h5><?php echo e(__('Chat GPT Settings')); ?></h5>
                        </div>
                        <?php echo e(Form::model($settings,array('route'=>'chatgpt.settings','method'=>'post'))); ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <?php echo e(Form::label('chat_gpt_key', __('Chat GPT key'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('chat_gpt_key',isset($settings['chat_gpt_key'])?$settings['chat_gpt_key']:'', ['class' => 'form-control', 'placeholder' => __('Enter Chat GPT API Key') , 'required' => 'required'])); ?>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <?php echo e(Form::label('chat_gpt_model', __('Chat GPT Model Name'), ['class' => 'col-form-label'])); ?>

                                        <?php echo e(Form::text('chat_gpt_model',isset($settings['chat_gpt_model'])?$settings['chat_gpt_model']:'', ['class' => 'form-control', 'placeholder' => __('Enter Chat GPT Modal Name') , 'required' => 'required'])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <input class="btn btn-print-invoice btn-primary m-r-10" type="submit" value="<?php echo e(__('Save Changes')); ?>">
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                    

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\erpg\resources\views/settings/index.blade.php ENDPATH**/ ?>