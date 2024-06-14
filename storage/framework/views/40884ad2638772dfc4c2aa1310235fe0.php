<?php
    use App\Models\Utility;
    $settings = \Modules\LandingPage\Entities\LandingPageSetting::settings();
    $logo = Utility::get_file('uploads/landing_page_image');
    $sup_logo = Utility::get_file('uploads/logo');

    $metatitle = isset($adminSettings['meta_title']) ? $adminSettings['meta_title'] : '';
    $metsdesc = isset($adminSettings['meta_desc']) ? $adminSettings['meta_desc'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($adminSettings['meta_image']) ? $adminSettings['meta_image'] : '';
    $get_cookie = \App\Models\Utility::getCookieSetting();

    $setting = \App\Models\Utility::colorset();

    $SITE_RTL = $adminSettings['SITE_RTL'] ? $adminSettings['SITE_RTL'] : '';

    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

    if(isset($setting['color_flag']) && $setting['color_flag'] == 'true')
    {
        $themeColor = 'custom-color';
    }
    else {
        $themeColor = $color;
    }

?>
<!DOCTYPE html>
<html lang="en" dir="<?php echo e($setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <title><?php echo e(env('APP_NAME')); ?></title>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />

    <meta name="title" content="<?php echo e($metatitle); ?>">
    <meta name="description" content="<?php echo e($metsdesc); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($metatitle); ?>">
    <meta property="og:description" content="<?php echo e($metsdesc); ?>">
    <meta property="og:image" content="<?php echo e($meta_image . $meta_logo); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($metatitle); ?>">
    <meta property="twitter:description" content="<?php echo e($metsdesc); ?>">
    <meta property="twitter:image" content="<?php echo e($meta_image . $meta_logo); ?>">

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo e($sup_logo . '/' . $adminSettings['company_favicon']); ?>" type="image/x-icon" />

    <!-- font css -->
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/tabler-icons.min.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/feather.css')); ?>" />
    <link rel="stylesheet" href="  <?php echo e(Module::asset('LandingPage:Resources/assets/fonts/fontawesome.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/fonts/material.css')); ?>" />


    <!-- vendor css -->
    <?php if($SITE_RTL == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>

    <?php if($setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(Module::asset('LandingPage:Resources/assets/css/style.css')); ?>"
            id="main-style-link">
    <?php endif; ?>

    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/customizer.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/landing-page.css')); ?>" />
    <link rel="stylesheet" href=" <?php echo e(Module::asset('LandingPage:Resources/assets/css/custom.css')); ?>" />
<style>
    :root {
        --color-customColor: <?= $color ?>;
    }

    body {
        background-color: #f0f0f0; /* Change this to your desired color */
    }
</style>

    <style>
        :root {
            --color-customColor: <?= $color ?>;    
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
</head>

<?php if($setting['cust_darklayout'] == 'on'): ?>

    <body class="<?php echo e($themeColor); ?> landing-dark">
    <?php else: ?>

        <body class="<?php echo e($themeColor); ?>">
<?php endif; ?>
<!-- [ Header ] start -->
<header class="main-header">
    <?php if($settings['topbar_status'] == 'on'): ?>
        <div class="announcement bg-dark text-center p-2">
            <p class="mb-0"><?php echo $settings['topbar_notification_msg']; ?></p>
        </div>
    <?php endif; ?>
    <?php if($settings['menubar_status'] == 'on'): ?>
        <div class="container">
            <nav class="navbar navbar-expand-md  default top-nav-collapse">
                <div class="header-left", style="padding-left: 20px;">
                    <a class="navbar-brand bg-transparent" href="#">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo']); ?>" alt="logo" class="landing_logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home"><?php echo e($settings['home_title']); ?></a>
                        </li>
                        <?php if($settings['feature_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#features"><?php echo e($settings['feature_title']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($settings['plan_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#plan"><?php echo e($settings['plan_title']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($settings['faq_status'] == 'on'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq"><?php echo e($settings['faq_title']); ?></a>
                        </li>
                        <?php endif; ?>


                        <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                            <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($value->header == 'on' && $value->template_name == 'page_content'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo e(route('custom.page', $value->page_slug)); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                    </li>
                                <?php elseif($value->header == 'on'): ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="<?php echo e($value->page_url); ?>"><?php echo e($value->menubar_page_name); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </ul>
                    <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="ms-auto d-flex justify-content-end gap-2", style="padding-right: 20px;">
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-dark rounded">
                        <span class="hide-mob me-2">
                            <?php echo e(__('Login')); ?>

                        </span>
                        <i data-feather="log-in"></i>
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-outline-dark rounded">
                        <span class="hide-mob me-2">
                            <?php echo e(__('Register')); ?>

                        </span>
                        <i data-feather="user-check"></i>
                    </a>
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </div>
    <?php endif; ?>

</header>
<!-- [ Header ] End -->
<!-- [ Banner ] start -->
<?php if($settings['home_status'] == 'on'): ?>
    <section class="main-banner bg-primary" id="home">
        <div class="container-offset">
            <div class="row gy-3 g-0 align-items-center">
                <div class="col-xxl-4 col-md-6", style="padding-left: 30px;">
                    <span class="badge py-2 px-3 bg-white text-dark rounded-pill fw-bold mb-3">
                        <?php echo e($settings['home_offer_text']); ?>

                    </span>
                    <h1 class="mb-3">
                        <?php echo e($settings['home_heading']); ?>

                    </h1>
                    <h6 class="mb-0"><?php echo e($settings['home_description']); ?></h6>
                    <div class="d-flex gap-3 mt-4 banner-btn">
                        <?php if($settings['home_live_demo_link']): ?>
                            <a href="<?php echo e($settings['home_live_demo_link']); ?>" class="btn btn-outline-dark">
                                <?php echo e(__('Live Demo')); ?>

                                <i data-feather="play-circle" class="ms-2"></i>
                            </a>
                        <?php endif; ?>
                        <?php if($settings['home_buy_now_link']): ?>
                            <a href="<?php echo e($settings['home_buy_now_link']); ?>"
                                class="btn btn-outline-dark"><?php echo e(__('Buy Now')); ?> <i data-feather="lock"
                                    class="ms-2"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xxl-8 col-md-6">               
                    <?php if(Storage::exists('/uploads/landing_page_image/'.$settings['home_banner'])): ?>
                    <div class="<?php echo e($settings['home_banner'] ? 'dash-preview' : ''); ?>">
                        <img class="img-fluid preview-img" src="<?php echo e($logo . '/' . $settings['home_banner']); ?>"
                            alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
            <div class="container">
                <div class="row g-0 gy-2 mt-4 align-items-center">
                    <div class="col-xxl-3">
                        <p class="mb-0"><?php echo e(__('Trusted by')); ?> <b class="fw-bold"><?php echo e($settings['home_trusted_by']); ?></b></p>
                    </div>
                    <div class="col-xxl-9">
                        <div class="row gy-3 row-cols-9">
                            <?php $__currentLoopData = explode(',', $settings['home_logo']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $home_logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <div class="col-auto">
                                <img src="<?php echo e($logo.'/'. $home_logo); ?>" alt="" class="landing_logo"
                                style="width: 130px;">
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>

    </section>
<?php endif; ?>
<!-- [ Banner ] start -->
<!-- [ features ] start -->
<?php if($settings['feature_status'] == 'on'): ?>
    <section class="features-section section-gap bg-dark" id="features">
        <div class="container">
            <div class="row gy-3">
                <div class="col-xxl-4">
                    <span class="d-block mb-2 text-uppercase"><?php echo e($settings['feature_title']); ?></span>
                    <div class="title mb-4">
                        <h2><b class="fw-bold"><?php echo $settings['feature_heading']; ?></b></h2>
                    </div>
                    <p class="mb-3"><?php echo $settings['feature_description']; ?></p>
                    <?php if($settings['feature_buy_now_link']): ?>
                        <a href="<?php echo e($settings['feature_buy_now_link']); ?>"
                            class="btn btn-primary rounded-pill d-inline-flex align-items-center"><?php echo e(__('Buy Now')); ?>

                            <i data-feather="lock" class="ms-2"></i></a>
                    <?php endif; ?>
                </div>
                <div class="col-xxl-8">
                    <div class="row">
                        <?php if(is_array(json_decode($settings['feature_of_features'], true)) ||
                                is_object(json_decode($settings['feature_of_features'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['feature_of_features'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-sm-6 d-flex">
                                    <div class="card <?php echo e($key == 0 ? 'bg-primary' : ''); ?>">
                                        <div class="card-body">
                                            <span class="theme-avtar avtar avtar-xl mb-4">
                                                <img src="<?php echo e($logo . '/' . $value['feature_logo']); ?>" alt="">
                                            </span>
                                            <h3 class="mb-3 <?php echo e($key == 0 ? '' : 'text-white'); ?>">
                                                <?php echo $value['feature_heading']; ?></h3>
                                            <p class=" f-w-600 mb-0 <?php echo e($key == 0 ? 'text-body' : ''); ?>">
                                                <?php echo $value['feature_description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 text-uppercase"><?php echo e($settings['feature_title']); ?></span>
                        <h2 class="mb-4"><?php echo $settings['highlight_feature_heading']; ?></h2>
                        <p><?php echo $settings['highlight_feature_description']; ?></p>
                    </div>
                    <?php if(Storage::exists('/uploads/landing_page_image/'.$settings['highlight_feature_image'])): ?>
                    <div class="features-preview">
                        <img class="img-fluid m-auto d-block"
                            src="<?php echo e($logo . '/' . $settings['highlight_feature_image']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ features ] start -->
<!-- [ element ] start -->
<?php if($settings['feature_status'] == 'on'): ?>
    
<?php endif; ?>
<!-- [ element ] end -->
<!-- [ element ] start -->
<?php if($settings['discover_status'] == 'on'): ?>
    
<?php endif; ?>
<!-- [ element ] end -->
<!-- [ Screenshots ] start -->
<?php if($settings['screenshots_status'] == 'on'): ?>
    <section class="screenshots section-gap">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-xxl-6">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase"><?php echo e(__('SCREENSHOTS')); ?></span>
                        <h2 class="mb-4"><?php echo $settings['screenshots_heading']; ?></h2>
                        <p><?php echo $settings['screenshots_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row gy-4 gx-4">
                <?php if(is_array(json_decode($settings['screenshots'], true)) || is_object(json_decode($settings['screenshots'], true))): ?>
                    <?php $__currentLoopData = json_decode($settings['screenshots'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="screenshot-card">
                                <div class="img-wrapper">
                                    <img src="<?php echo e($logo . '/' . $value['screenshots']); ?>"
                                        class="img-fluid header-img mb-4 shadow-sm" alt="">
                                </div>
                                <h5 class="mb-0"><?php echo $value['screenshots_heading']; ?></h5>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ Screenshots ] start -->
<!-- [ subscription ] start -->
<?php if($settings['plan_status'] == 'on'): ?>
    <section class="subscription bg-primary section-gap" id="plan">
        <div class="container">
            <div class="row mb-2 justify-content-center">
                <div class="col-xxl-6">
                    <div class="title text-center mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase"><?php echo e(__('PLAN')); ?></span>
                        <h2 class="mb-4"><?php echo $settings['plan_heading']; ?></h2>
                        <p><?php echo $settings['plan_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <?php
                    $collection = \App\Models\Plan::orderBy('price', 'ASC')->get();
                    $admin_payment_setting = Utility::getAdminPaymentSetting();
                ?>
                <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xxl-3 col-lg-4 col-md-6">
                        <div class="card price-card shadow-none <?php echo e($key == 2 ? 'bg-dark' : ''); ?>">
                            <div class="card-body">
                                <span class="price-badge bg-dark"><?php echo e($value->name); ?></span>
                                <span
                                    class="mb-4 f-w-00 p-price"><?php echo e(isset($admin_payment_setting['currency_symbol']) ? $admin_payment_setting['currency_symbol'] : '$'); ?><?php echo e(intval($value->price)); ?><small
                                        class="text-sm">/<?php echo e($value->duration); ?></small></span>
                                <p>
                                    <?php echo $value->description; ?>

                                </p>
                                <ul class="list-unstyled my-3">
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->max_users == -1 ? 'Unlimited' : $value->max_users); ?>

                                                <?php echo e(__('User')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->max_customers == -1 ? 'Unlimited' : $value->max_customers); ?>

                                                <?php echo e(__('Customer')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->max_venders == -1 ? 'Unlimited' : $value->max_venders); ?>

                                                <?php echo e(__('Vendors')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->max_clients == -1 ? 'Unlimited' : $value->max_clients); ?>

                                                <?php echo e(__('Clients')); ?></label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->account == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('Account')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->crm == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('CRM')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->hrm == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('HRM')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->project == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('Project')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->pos == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('POS')); ?></label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check text-start">
                                            <label class="form-check-label"
                                                for="customCheckc1"><?php echo e($value->chatgpt == 1 ? 'Enable' : 'Disable'); ?>

                                                <?php echo e(__('ChatGPT')); ?></label>
                                        </div>
                                    </li>

                                </ul>
                                <div class="d-grid">
                                    <a href="<?php echo e(route('register')); ?>"
                                        class="btn btn-primary rounded-pill"><?php echo e(__('Start with Starter')); ?> <i
                                            data-feather="log-in" class="ms-2"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ subscription ] end -->
<!-- [ FAqs ] start -->

<?php if($settings['faq_status'] == 'on'): ?>
    <section class="faqs section-gap bg-gray-100" id="faq">
        <div class="container">
            <div class="row mb-2">
                <div class="col-xxl-6">
                    <div class="title mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase"><?php echo e($settings['faq_title']); ?></span>
                        <h2 class="mb-4"><?php echo $settings['faq_heading']; ?></h2>
                        <p><?php echo $settings['faq_description']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php if(is_array(json_decode($settings['faqs'], true)) || is_object(json_decode($settings['faqs'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['faqs'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key % 2 == 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="<?php echo e('flush-heading' . $key); ?>">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="<?php echo e('#flush-' . $key); ?>"
                                                aria-expanded="false" aria-controls="<?php echo e('flush-collapse' . $key); ?>">
                                                <?php echo $value['faq_questions']; ?>

                                            </button>
                                        </h2>
                                        <div id="<?php echo e('flush-' . $key); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="<?php echo e('flush-heading' . $key); ?>"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?php echo $value['faq_answer']; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion accordion-flush" id="accordionFlushExample2">
                        <?php if(is_array(json_decode($settings['faqs'], true)) || is_object(json_decode($settings['faqs'], true))): ?>
                            <?php $__currentLoopData = json_decode($settings['faqs'], true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($key % 2 != 0): ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="<?php echo e('flush-heading' . $key); ?>">
                                            <button class="accordion-button collapsed fw-bold" type="button"
                                                data-bs-toggle="collapse" data-bs-target="<?php echo e('#flush-' . $key); ?>"
                                                aria-expanded="false" aria-controls="<?php echo e('flush-collapse' . $key); ?>">
                                                <?php echo $value['faq_questions']; ?>

                                            </button>
                                        </h2>
                                        <div id="<?php echo e('flush-' . $key); ?>" class="accordion-collapse collapse"
                                            aria-labelledby="<?php echo e('flush-heading' . $key); ?>"
                                            data-bs-parent="#accordionFlushExample2">
                                            <div class="accordion-body">
                                                <?php echo $value['faq_answer']; ?>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>
<!-- [ FAqs ] end -->
<!-- [ testimonial ] start -->
<?php if($settings['testimonials_status'] == 'on'): ?>
    <section class="testimonial section-gap">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="title mb-4">
                        <span class="d-block mb-2 fw-bold text-uppercase"><?php echo e(__('TESTIMONIALS')); ?></span>
                        <h2 class="mb-2"><?php echo $settings['testimonials_heading']; ?></h2>
                        <p><?php echo $settings['testimonials_description']; ?></p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row justify-content-center gy-3">


                        <?php if(is_array(json_decode($settings['testimonials'])) || is_object(json_decode($settings['testimonials']))): ?>
                            <?php $__currentLoopData = json_decode($settings['testimonials']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xxl-4 col-sm-6 col-lg-6 col-md-4">
                                    <div class="card bg-dark shadow-none mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex mb-3 align-items-center justify-content-between">
                                                <span class="theme-avtar avtar avtar-sm bg-light-dark rounded-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="36"
                                                        height="23" viewBox="0 0 36 23" fill="none">
                                                        <path
                                                            d="M12.4728 22.6171H0.770508L10.6797 0.15625H18.2296L12.4728 22.6171ZM29.46 22.6171H17.7577L27.6669 0.15625H35.2168L29.46 22.6171Z"
                                                            fill="white" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <?php for($i = 1; $i <= (int) $value->testimonials_star; $i++): ?>
                                                        <i data-feather="star"></i>
                                                    <?php endfor; ?>
                                                </span>
                                            </div>
                                            <h3 class="text-white"><?php echo e($value->testimonials_title); ?></h3>
                                            <p class="hljs-comment">
                                                <?php echo e($value->testimonials_description); ?>

                                            </p>
                                            <div class="d-flex  align-items-center ">
                                                <img src="<?php echo e($logo . '/' . $value->testimonials_user_avtar); ?>"
                                                    class="wid-40 rounded-circle me-3" alt="">
                                                <span>
                                                    <b class="fw-bold d-block"><?php echo e($value->testimonials_user); ?></b>
                                                    <?php echo e($value->testimonials_designation); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>




                    </div>
                </div>
                <div class="col-12">
                    <p class="mb-0 f-w-600">
                        <?php echo $settings['testimonials_long_description']; ?>

                    </p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast" class="toast text-white  fade" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body"> </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- [ testimonial ] end -->
<!-- [ Footer ] start -->
<footer class="site-footer bg-gray-100">
    <div class="container">
        <div class="footer-row">
            <div class="ftr-col cmp-detail">
                <div class="footer-logo mb-3">
                    <a href="#">
                        <img src="<?php echo e($logo . '/' . $settings['site_logo']); ?>" alt="logo">
                    </a>
                </div>
                <p>
                    <?php echo $settings['site_description']; ?>

                </p>

            </div>
            <div class="ftr-col">
                <ul class="list-unstyled">

                    <?php if(is_array(json_decode($settings['menubar_page'])) || is_object(json_decode($settings['menubar_page']))): ?>
                        <?php $__currentLoopData = json_decode($settings['menubar_page']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value->footer == 'on' && $value->header == 'off' && $value->template_name == 'page_content'): ?>
                                <li><a
                                        href="<?php echo e(route('custom.page', $value->page_slug)); ?>"><?php echo $value->menubar_page_name; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if($value->footer == 'on' && $value->header == 'on' && $value->template_name == 'page_content'): ?>
                                <li><a
                                        href="<?php echo e(route('custom.page', $value->page_slug)); ?>"><?php echo $value->menubar_page_name; ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if($value->footer == 'on' && $value->header == 'on' && $value->template_name == 'page_url'): ?>
                                <li><a href="<?php echo e($value->page_url); ?>"><?php echo $value->menubar_page_name; ?></a></li>
                            <?php endif; ?>
                            <?php if($value->footer == 'on' && $value->header == 'off' && $value->template_name == 'page_url'): ?>
                                <li><a href="<?php echo e($value->page_url); ?>"><?php echo $value->menubar_page_name; ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </ul>
            </div>

            <?php if($settings['joinus_status'] == 'on'): ?>
                <div class="ftr-col ftr-subscribe">
                    <h2><?php echo $settings['joinus_heading']; ?></h2>
                    <p><?php echo $settings['joinus_description']; ?></p>
                    <form method="post" action="<?php echo e(route('join_us_store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-wrapper border border-dark">
                            <input type="email" name="email" placeholder="Type your email address...">
                            <button type="submit" class="btn btn-dark rounded-pill"><?php echo e(__('Join Us')); ?>!</button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="border-top border-dark text-center p-2">
        <p class="mb-0"> &copy;
            <?php echo e(date('Y')); ?>

            <?php echo e(Utility::getValByName('footer_text') ? Utility::getValByName('footer_text') : config('app.name', 'ERPGo')); ?>

        </p>

    </div>
</footer>
<!-- [ Footer ] end -->
<!-- Required Js -->


<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/popper.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(Module::asset('LandingPage:Resources/assets/js/plugins/feather.min.js')); ?>"></script>

<script>
    // Start [ Menu hide/show on scroll ]
    let ost = 0;
    document.addEventListener("scroll", function() {
        let cOst = document.documentElement.scrollTop;
        if (cOst == 0) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
        } else if (cOst > ost) {
            document.querySelector(".navbar").classList.add("top-nav-collapse");
            document.querySelector(".navbar").classList.remove("default");
        } else {
            document.querySelector(".navbar").classList.add("default");
            document
                .querySelector(".navbar")
                .classList.remove("top-nav-collapse");
        }
        ost = cOst;
    });
    // End [ Menu hide/show on scroll ]

    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: "#navbar-example",
    });
    feather.replace();
</script>

<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

<?php if($message = Session::get('success')): ?>
<script>
    show_toastr('success', '<?php echo $message; ?>');
</script>
<?php endif; ?>
<?php if($message = Session::get('error')): ?>
<script>
    show_toastr('error', '<?php echo $message; ?>');
</script>
<?php endif; ?>


<?php if($get_cookie['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>


</body>

</html>
<?php /**PATH /home/plan8376/public_html/Modules/LandingPage/Resources/views/layouts/landingpage.blade.php ENDPATH**/ ?>