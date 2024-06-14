<?php
    // $profile=asset(Storage::url('uploads/avatar/'));
    $profile = \App\Models\Utility::get_file('uploads/avatar');
?>
<?php $__env->startSection('page-title'); ?>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <?php echo e(__('Manage Companies')); ?>

    <?php else: ?>
        <?php echo e(__('Manage User')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
    </li>
    <?php if(\Auth::user()->type == 'super admin'): ?>
        <li class="breadcrumb-item"><?php echo e(__('Companies')); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item"><?php echo e(__('User')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'HR'): ?>
            <a href="<?php echo e(route('user.userlog')); ?>" class="btn btn-primary btn-sm <?php echo e(Request::segment(1) == 'user'); ?>"
                data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('User Logs History')); ?>"><i
                    class="ti ti-user-check"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create user')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('users.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="<?php echo e(\Auth::user()->type == 'super admin' ?  __('Create Company')  : __('Create User')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xxl-12">
            <div class="row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-4">
                        <div class="card text-center card-2">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="mb-0">
                                        <?php if(\Auth::user()->type == 'super admin'): ?>
                                            <div class="badge bg-primary p-2 px-3 rounded">
                                                <?php echo e(!empty($user->currentPlan) ? $user->currentPlan->name : ''); ?>

                                            </div>
                                        <?php else: ?>
                                            <div class="badge bg-primary p-2 px-3 rounded">
                                                <?php echo e(ucfirst($user->type)); ?>

                                            </div>
                                        <?php endif; ?>
                                    </h6>
                                </div>
                                <?php if(Gate::check('edit user') || Gate::check('delete user')): ?>
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <?php if($user->is_active == 1 && $user->is_disable == 1): ?>
                                                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="ti ti-dots-vertical"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-end">

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit user')): ?>
                                                        <a href="#!" data-size="lg"
                                                            data-url="<?php echo e(route('users.edit', $user->id)); ?>"
                                                            data-ajax-popup="true" class="dropdown-item"
                                                            data-bs-original-title="<?php echo e(\Auth::user()->type == 'super admin' ?  __('Edit Company')  : __('Edit User')); ?>">
                                                            <i class="ti ti-pencil"></i>
                                                            <span><?php echo e(__('Edit')); ?></span>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete user')): ?>
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['users.destroy', $user['id']],
                                                            'id' => 'delete-form-' . $user['id'],
                                                        ]); ?>

                                                        <a href="#!" class="dropdown-item bs-pass-para">
                                                            <i class="ti ti-archive"></i>
                                                            <span>
                                                                <?php if($user->delete_status != 0): ?>
                                                                    <?php echo e(__('Delete')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(__('Restore')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    <?php endif; ?>

                                                    <?php if(Auth::user()->type == 'super admin'): ?>
                                                        <a href="<?php echo e(route('login.with.company', $user->id)); ?>"
                                                            class="dropdown-item"
                                                            data-bs-original-title="<?php echo e(__('Login As Company')); ?>">
                                                            <i class="ti ti-replace"></i>
                                                            <span> <?php echo e(__('Login As Company')); ?></span>
                                                        </a>
                                                    <?php endif; ?>

                                                    <a href="#!"
                                                        data-url="<?php echo e(route('users.reset', \Crypt::encrypt($user->id))); ?>"
                                                        data-ajax-popup="true" data-size="md" class="dropdown-item"
                                                        data-bs-original-title="<?php echo e(__('Reset Password')); ?>">
                                                        <i class="ti ti-adjustments"></i>
                                                        <span> <?php echo e(__('Reset Password')); ?></span>
                                                    </a>

                                                    <?php if($user->is_enable_login == 1): ?>
                                                    <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                                        class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-danger"> <?php echo e(__('Login Disable')); ?></span>
                                                    </a>
                                                <?php elseif($user->is_enable_login == 0 && $user->password == null): ?>
                                                    <a href="#" data-url="<?php echo e(route('users.reset', \Crypt::encrypt($user->id))); ?>"
                                                        data-ajax-popup="true" data-size="md" class="dropdown-item login_enable"
                                                        data-title="<?php echo e(__('New Password')); ?>" class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                                        class="dropdown-item">
                                                        <i class="ti ti-road-sign"></i>
                                                        <span class="text-success"> <?php echo e(__('Login Enable')); ?></span>
                                                    </a>
                                                <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <a href="#" class="action-item text-lg"><i class="ti ti-lock"></i></a>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="card-body full-card">
                                <div class="img-fluid rounded-circle card-avatar">
                                    <img src="<?php echo e(!empty($user->avatar) ? asset(Storage::url('uploads/avatar/' . $user->avatar)) : asset(Storage::url('uploads/avatar/avatar.png'))); ?>"
                                        class="img-user wid-80 round-img rounded-circle">
                                </div>
                                <h4 class=" mt-3 text-primary"><?php echo e($user->name); ?></h4>
                                <?php if($user->delete_status == 0): ?>
                                    <h5 class="office-time mb-0"><?php echo e(__('Soft Deleted')); ?></h5>
                                <?php endif; ?>
                                <small class="text-primary"><?php echo e($user->email); ?></small>
                                <p></p>
                                <div class="text-center" data-bs-toggle="tooltip" title="<?php echo e(__('Last Login')); ?>">
                                    <?php echo e(!empty($user->last_login_at) ? $user->last_login_at : ''); ?>

                                </div>
                                <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="mt-4">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-6 text-center Id ">
                                                <a href="#" data-url="<?php echo e(route('plan.upgrade', $user->id)); ?>"
                                                    data-size="lg" data-ajax-popup="true" class="btn btn-outline-primary"
                                                    data-title="<?php echo e(__('Upgrade Plan')); ?>"><?php echo e(__('Upgrade Plan')); ?></a>
                                            </div>
                                            <div class="col-6 text-center Id ">
                                                <a href="#" data-url="<?php echo e(route('company.info', $user->id)); ?>"
                                                    data-size="lg" data-ajax-popup="true" class="btn btn-outline-primary"
                                                    data-title="<?php echo e(__('Company Info')); ?>"><?php echo e(__('AdminHub')); ?></a>
                                            </div>
                                            <div class="col-12">
                                                <hr class="my-3">
                                            </div>
                                            <div class="col-12 text-center pb-2">
                                                <span class="text-dark text-xs"><?php echo e(__('Plan Expired : ')); ?>

                                                    <?php echo e(!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date) : __('Lifetime')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-sm-12">
                                            <div class="card mb-0">
                                                <div class="card-body p-3">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip"
                                                                title="<?php echo e(__('Users')); ?>"><i
                                                                    class="ti ti-users card-icon-text-space"></i><?php echo e($user->totalCompanyUser($user->id)); ?>

                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip"
                                                                title="<?php echo e(__('Customers')); ?>"><i
                                                                    class="ti ti-users card-icon-text-space"></i><?php echo e($user->totalCompanyCustomer($user->id)); ?>

                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <p class="text-muted text-sm mb-0" data-bs-toggle="tooltip"
                                                                title="<?php echo e(__('Vendors')); ?>"><i
                                                                    class="ti ti-users card-icon-text-space"></i><?php echo e($user->totalCompanyVender($user->id)); ?>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#password_switch', function() {
            if ($(this).is(':checked')) {
                $('.ps_div').removeClass('d-none');
                $('#password').attr("required", true);

            } else {
                $('.ps_div').addClass('d-none');
                $('#password').val(null);
                $('#password').removeAttr("required");
            }
        });
        $(document).on('click', '.login_enable', function() {
            setTimeout(function() {
                $('.modal-body').append($('<input>', {
                    type: 'hidden',
                    val: 'true',
                    name: 'login_enable'
                }));
            }, 2000);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\erpg\resources\views/user/index.blade.php ENDPATH**/ ?>