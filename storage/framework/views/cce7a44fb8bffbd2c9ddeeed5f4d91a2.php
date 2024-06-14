<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Chart of Accounts')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Chart of Account')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '#sub_type', function() {            
            $('.acc_check').removeClass('d-none');
            var type = $(this).val();
            $.ajax({
                url: '<?php echo e(route('charofAccount.subType')); ?>',
                type: 'POST',
                data: {
                    "type": type,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#parent').empty();
                    $.each(data, function(key, value) {
                        $('#parent').append('<option value="' + key + '">' + value +
                            '</option>');
                    });
                }
            });
        });
        $(document).on('click', '#account', function() {
            const element = $('#account').is(':checked');
            $('.acc_type').addClass('d-none');
            if (element==true) {
                $('.acc_type').removeClass('d-none');
            } else {
                $('.acc_type').addClass('d-none');
            }
        });
    </script>
            <script>
                $(document).ready(function () {
                    callback();
                    function callback() {
                        var start_date = $(".startDate").val();
                        var end_date = $(".endDate").val();
        
                        $('.start_date').val(start_date);
                        $('.end_date').val(end_date);
        
                    }
                    });
        
            </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create chart of account')): ?>
            <a href="#" data-url="<?php echo e(route('chart-of-account.create')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Create New Account')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="mt-2" id="multiCollapseExample1">
            <div class="card" id="show_filter">
                <div class="card-body">
                    <?php echo e(Form::open(['route' => ['chart-of-account.index'], 'method' => 'GET', 'id' => 'report_bill_summary'])); ?>

                    <div class="row align-items-center justify-content-end">
                        <div class="col-xl-10">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::date('start_date', $filter['startDateRange'], ['class' => 'startDate form-control'])); ?>

                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::date('end_date', $filter['endDateRange'], ['class' => 'endDate form-control'])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mt-4">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#" class="btn btn-sm btn-primary"
                                        onclick="document.getElementById('report_bill_summary').submit(); return false;"
                                        data-bs-toggle="tooltip" title="<?php echo e(__('Apply')); ?>"
                                        data-original-title="<?php echo e(__('apply')); ?>">
                                        <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                    </a>

                                    <a href="<?php echo e(route('chart-of-account.index')); ?>" class="btn btn-sm btn-danger "
                                        data-bs-toggle="tooltip" title="<?php echo e(__('Reset')); ?>"
                                        data-original-title="<?php echo e(__('Reset')); ?>">
                                        <span class="btn-inner--icon"><i
                                                class="ti ti-trash-off text-white-off "></i></span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
    <div class="row">
        <?php $__currentLoopData = $chartAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6><?php echo e($type); ?></h6>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"> <?php echo e(__('Code')); ?></th>
                                        <th width="30%"> <?php echo e(__('Name')); ?></th>
                                        <th width="20%"> <?php echo e(__('Type')); ?></th>
                                        <th width="20%"> <?php echo e(__('Parent Account Name')); ?></th>
                                        <th width="20%"> <?php echo e(__('Balance')); ?></th>
                                        <th width="10%"> <?php echo e(__('Status')); ?></th>
                                        <th width="10%"> <?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $balance = 0;
                                            $totalDebit = 0;
                                            $totalCredit = 0;
                                            $totalBalance = App\Models\Utility::getAccountBalance($account->id,$filter['startDateRange'],$filter['endDateRange']);
                                        ?>

                                        <tr>
                                            <td><?php echo e($account->code); ?></td>
                                            <td><a
                                                    href="<?php echo e(route('report.ledger', $account->id)); ?>?account=<?php echo e($account->id); ?>"><?php echo e($account->name); ?></a>
                                            </td>
                                            <td><?php echo e(!empty($account->subType) ? $account->subType->name : '-'); ?></td>
                                            <td><?php echo e(!empty($account->parentAccount) ? $account->parentAccount->name : '-'); ?></td>

                                            <td>
                                                <?php if(!empty($totalBalance)): ?>
                                                    <?php echo e(\Auth::user()->priceFormat($totalBalance)); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($account->is_enabled == 1): ?>
                                                    <span
                                                        class="badge bg-primary p-2 px-3 rounded"><?php echo e(__('Enabled')); ?></span>
                                                <?php else: ?>
                                                    <span
                                                        class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('Disabled')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="Action">
                                                <div class="action-btn bg-warning ms-2">
                                                    <a href="<?php echo e(route('report.ledger', $account->id)); ?>?account=<?php echo e($account->id); ?>"
                                                        class="mx-3 btn btn-sm align-items-center " data-bs-toggle="tooltip"
                                                        title="<?php echo e(__('Transaction Summary')); ?>"
                                                        data-original-title="<?php echo e(__('Detail')); ?>">
                                                        <i class="ti ti-wave-sine text-white"></i>
                                                    </a>
                                                </div>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit chart of account')): ?>
                                                    <div class="action-btn bg-primary ms-2">
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center"
                                                            data-url="<?php echo e(route('chart-of-account.edit', $account->id)); ?>"
                                                            data-ajax-popup="true" data-title="<?php echo e(__('Edit Account')); ?>"
                                                            data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                            data-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete chart of account')): ?>
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['chart-of-account.destroy', $account->id],
                                                            'id' => 'delete-form-' . $account->id,
                                                        ]); ?>

                                                        <a href="#"
                                                            class="mx-3 btn btn-sm align-items-center bs-pass-para"
                                                            data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                            data-original-title="<?php echo e(__('Delete')); ?>"
                                                            data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                            data-confirm-yes="document.getElementById('delete-form-<?php echo e($account->id); ?>').submit();">
                                                            <i class="ti ti-trash text-white"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\erpg\resources\views/chartOfAccount/index.blade.php ENDPATH**/ ?>