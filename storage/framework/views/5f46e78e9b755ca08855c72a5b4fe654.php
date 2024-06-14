<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Receivable Reports')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Receivable Reports')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>

    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var printContents = document.getElementById('printableArea').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#filter").click(function() {
                $("#show_filter").toggle();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            callback();

            function callback() {
                var start_date = $(".startDate").val();
                var end_date = $(".endDate").val();

                $('.start_date').val(start_date);
                $('.end_date').val(end_date);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            var id1 = $('.nav-item .active').attr('href');
            $('.report').val(id1);

            $("ul.nav-pills > li > a").click(function() {
                var report = $(this).attr('href');
                $('.report').val(report);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
<div class="float-end">
    <a href="#" onclick="saveAsPDF()" class="btn btn-sm btn-primary me-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('Print')); ?>" data-original-title="<?php echo e(__('Print')); ?>"><i class="ti ti-printer"></i></a>
</div>

    

    <div class="float-end me-2" id="filter">
        <button id="filter" class="btn btn-sm btn-primary"><i class="ti ti-filter"></i></button>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="mt-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="mt-2" id="multiCollapseExample1">
                    <div class="card" id="show_filter" style="display:none;">
                        <div class="card-body">
                            <?php echo e(Form::open(['route' => ['report.receivables'], 'method' => 'GET', 'id' => 'report_receivable'])); ?>

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
                                        <input type="hidden" name="report" class="report">
                                    </div>
                                </div>
                                <div class="col-auto mt-4">
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="#" class="btn btn-sm btn-primary"
                                                onclick="document.getElementById('report_receivable').submit(); return false;"
                                                data-bs-toggle="tooltip" title="<?php echo e(__('Apply')); ?>"
                                                data-original-title="<?php echo e(__('apply')); ?>">
                                                <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                            </a>

                                            <a href="<?php echo e(route('report.receivables')); ?>" class="btn btn-sm btn-danger "
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
    </div>

    <div class="row">
        <div class="col-12" id="invoice-container">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between w-100">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="receivable-tab1" data-bs-toggle="pill"
                                    href="#customer_balance" role="tab" aria-controls="pills-customer-balance"
                                    aria-selected="true"><?php echo e(__('Customer Balance')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="receivable-tab2" data-bs-toggle="pill" href="#receivable_summary"
                                    role="tab" aria-controls="pills-receivable-summary"
                                    aria-selected="false"><?php echo e(__('Receivable Summary')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="receivable-tab3" data-bs-toggle="pill" href="#receivable_details"
                                    role="tab" aria-controls="pills-receivable-details"
                                    aria-selected="false"><?php echo e(__('Receivable Details')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="receivable-tab4" data-bs-toggle="pill" href="#aging_summary"
                                    role="tab" aria-controls="pills-aging-summary"
                                    aria-selected="false"><?php echo e(__('Aging Summary')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="receivable-tab5" data-bs-toggle="pill" href="#aging_details"
                                    role="tab" aria-controls="pills-aging-details"
                                    aria-selected="false"><?php echo e(__('Aging Details')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="printableArea">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="tab-content" id="myTabContent2">
                                <div class="tab-pane fade fade show active" id="customer_balance" role="tabpanel"
                                    aria-labelledby="receivable-tab1">
                                    <div class="table-responsive">

                                    <table class="table pc-dt-simple" id="report-customer-balance">
                                        <thead>
                                            <tr>
                                                <th width="33%"> <?php echo e(__('Customer Name')); ?></th>
                                                <th width="33%"> <?php echo e(__('Invoice Balance')); ?></th>
                                                <th width="33%"> <?php echo e(__('Available Credits')); ?></th>
                                                <th class="text-end"> <?php echo e(__('Balance')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $mergedArray = [];

                                                foreach ($receivableCustomers as $item) {
                                                    $name = $item['name'];

                                                    if (!isset($mergedArray[$name])) {
                                                        $mergedArray[$name] = [
                                                            'name' => $name,
                                                            'price' => 0.0,
                                                            'pay_price' => 0.0,
                                                            'total_tax' => 0.0,
                                                            'credit_price' => 0.0,
                                                        ];
                                                    }

                                                    $mergedArray[$name]['price'] += floatval($item['price']);
                                                    if ($item['pay_price'] !== null) {
                                                        $mergedArray[$name]['pay_price'] += floatval($item['pay_price']);
                                                    }
                                                    $mergedArray[$name]['total_tax'] += floatval($item['total_tax']);
                                                    $mergedArray[$name]['credit_price'] += floatval($item['credit_price']);
                                                }
                                                $resultArray = array_values($mergedArray);
                                                $total = 0;
                                            ?>
                                            <?php $__currentLoopData = $resultArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receivableCustomer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php
                                                        $customerBalance = $receivableCustomer['price'] + $receivableCustomer['total_tax'] - $receivableCustomer['pay_price'];
                                                        $balance = $customerBalance - $receivableCustomer['credit_price'];
                                                        $total += $balance;
                                                    ?>
                                                    <td> <?php echo e($receivableCustomer['name']); ?></td>
                                                    <td> <?php echo e(\Auth::user()->priceFormat($customerBalance)); ?> </td>
                                                    <td> <?php echo e(!empty($receivableCustomer['credit_price']) ? \Auth::user()->priceFormat($receivableCustomer['credit_price']) : \Auth::user()->priceFormat(0)); ?>

                                                    </td>
                                                    <td class="text-end"> <?php echo e(\Auth::user()->priceFormat($balance)); ?> </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($receivableCustomers != []): ?>
                                                <tr>
                                                    <th><?php echo e(__('Total')); ?></th>
                                                    <td></td>
                                                    <td></td>
                                                    <th class="text-end"><?php echo e(\Auth::user()->priceFormat($total)); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                                <div class="tab-pane fade fade show" id="receivable_summary" role="tabpanel"
                                    aria-labelledby="receivable-tab2">
                                    <div class="table-responsive">
                                    <table class="table pc-dt-simple" id="report-receivable-summary">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Customer Name')); ?></th>
                                                <th><?php echo e(__('Date')); ?></th>
                                                <th><?php echo e(__('Transaction')); ?></th>
                                                <th><?php echo e(__('Status')); ?></th>
                                                <th><?php echo e(__('Transaction Type')); ?></th>
                                                <th><?php echo e(__('Total')); ?></th>
                                                <th><?php echo e(__('Balance')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $total = 0;
                                                $totalAmount = 0;

                                                function compare($a, $b)
                                                {
                                                    return strtotime($b['issue_date']) - strtotime($a['issue_date']);
                                                }
                                                usort($receivableSummaries, 'compare');
                                            ?>
                                            <?php $__currentLoopData = $receivableSummaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receivableSummary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php
                                                        if ($receivableSummary['invoice']) {
                                                            $receivableBalance = $receivableSummary['price'] + $receivableSummary['total_tax'];
                                                        } else {
                                                            $receivableBalance = -$receivableSummary['price'];
                                                        }
                                                        $pay_price = $receivableSummary['pay_price'] != null ? $receivableSummary['pay_price'] : 0;
                                                        $balance = $receivableBalance - $pay_price;
                                                        $total += $balance;
                                                        $totalAmount += $receivableBalance;
                                                    ?>
                                                    <td> <?php echo e($receivableSummary['name']); ?></td>
                                                    <td> <?php echo e($receivableSummary['issue_date']); ?></td>
                                                    <?php if($receivableSummary['invoice']): ?>
                                                        <td> <?php echo e(\Auth::user()->invoiceNumberFormat($receivableSummary['invoice'])); ?>

                                                        <?php else: ?>
                                                        <td><?php echo e(__('Credit Note')); ?></td>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($receivableSummary['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableSummary['status']])); ?></span>
                                                        <?php elseif($receivableSummary['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableSummary['status']])); ?></span>
                                                        <?php elseif($receivableSummary['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableSummary['status']])); ?></span>
                                                        <?php elseif($receivableSummary['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableSummary['status']])); ?></span>
                                                        <?php elseif($receivableSummary['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableSummary['status']])); ?></span>
                                                        <?php else: ?>
                                                            <span class="p-2 px-3">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if($receivableSummary['invoice']): ?>
                                                        <td> <?php echo e(__('Invoice')); ?>

                                                        <?php else: ?>
                                                        <td><?php echo e(__('Credit Note')); ?></td>
                                                    <?php endif; ?>
                                                    <td> <?php echo e(\Auth::user()->priceFormat($receivableBalance)); ?> </td>

                                                    <td> <?php echo e(\Auth::user()->priceFormat($balance)); ?> </td>

                                                    
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($receivableSummaries != []): ?>
                                                <tr>
                                                    <th><?php echo e(__('Total')); ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($totalAmount)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($total)); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                </div>

                                <div class="tab-pane fade fade show" id="receivable_details" role="tabpanel"
                                    aria-labelledby="receivable-tab3">
                                    <div class="table-responsive">

                                    <table class="table pc-dt-simple" id="report-receivable-details">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Customer Name')); ?></th>
                                                <th><?php echo e(__('Date')); ?></th>
                                                <th><?php echo e(__('Transaction')); ?></th>
                                                <th><?php echo e(__('Status')); ?></th>
                                                <th><?php echo e(__('Transaction Type')); ?></th>
                                                <th><?php echo e(__('Item Name')); ?></th>
                                                <th><?php echo e(__('Quantity Ordered')); ?></th>
                                                <th><?php echo e(__('Item Price')); ?></th>
                                                <th><?php echo e(__('Total')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $total = 0;
                                                $totalQuantity = 0;

                                                function compares($a, $b)
                                                {
                                                    return strtotime($b['issue_date']) - strtotime($a['issue_date']);
                                                }
                                                usort($receivableDetails, 'compares');
                                            ?>
                                            <?php $__currentLoopData = $receivableDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receivableDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <?php
                                                        if ($receivableDetail['invoice']) {
                                                            $receivableBalance = $receivableDetail['price'];
                                                        } else {
                                                            $receivableBalance = -$receivableDetail['price'];
                                                        }
                                                        if ($receivableDetail['invoice']) {
                                                            $quantity = $receivableDetail['quantity'];
                                                        } else {
                                                            $quantity = 0;
                                                        }

                                                        if ($receivableDetail['invoice']) {
                                                            $itemTotal = $receivableBalance * $receivableDetail['quantity'];
                                                        } else {
                                                            $itemTotal = -$receivableDetail['price'];
                                                        }

                                                        $total += $itemTotal;
                                                        $totalQuantity += $quantity;
                                                    ?>
                                                    <td> <?php echo e($receivableDetail['name']); ?></td>
                                                    <td> <?php echo e($receivableDetail['issue_date']); ?></td>
                                                    <?php if($receivableDetail['invoice']): ?>
                                                        <td> <?php echo e(\Auth::user()->invoiceNumberFormat($receivableDetail['invoice'])); ?>

                                                        </td>
                                                    <?php else: ?>
                                                        <td><?php echo e(__('Credit Note')); ?></td>
                                                    <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if($receivableDetail['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableDetail['status']])); ?></span>
                                                        <?php elseif($receivableDetail['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableDetail['status']])); ?></span>
                                                        <?php elseif($receivableDetail['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableDetail['status']])); ?></span>
                                                        <?php elseif($receivableDetail['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableDetail['status']])); ?></span>
                                                        <?php elseif($receivableDetail['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$receivableDetail['status']])); ?></span>
                                                        <?php else: ?>
                                                            <span class="p-2 px-3">-</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if($receivableDetail['invoice']): ?>
                                                        <td> <?php echo e(__('Invoice')); ?></td>
                                                    <?php else: ?>
                                                        <td><?php echo e(__('Credit Note')); ?></td>
                                                    <?php endif; ?>
                                                    <td><?php echo e($receivableDetail['product_name']); ?></td>
                                                    <td> <?php echo e($quantity); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($receivableBalance)); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($itemTotal)); ?></td>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($receivableSummaries != []): ?>
                                                <tr>
                                                    <th><?php echo e(__('Total')); ?></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e($totalQuantity); ?></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($total)); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                </div>

                                <div class="tab-pane fade fade show" id="aging_summary" role="tabpanel"
                                    aria-labelledby="receivable-tab4">
                                    <div class="table-responsive">

                                    <table class="table pc-dt-simple" id="report-aging-summary">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Customer Name')); ?></th>
                                                <th><?php echo e(__('Current')); ?></th>
                                                <th><?php echo e(__('1-15 DAYS')); ?></th>
                                                <th><?php echo e(__('16-30 DAYS')); ?></th>
                                                <th><?php echo e(__('31-45 DAYS')); ?></th>
                                                <th><?php echo e(__('> 45 DAYS')); ?></th>
                                                <th><?php echo e(__('Total')); ?></th>
                                            </tr>
                                        </thead>



                                        <tbody>
                                            <?php
                                                $currentTotal = 0;
                                                $days15 = 0;
                                                $days30 = 0;
                                                $days45 = 0;
                                                $daysMore45 = 0;
                                                $total = 0;

                                            ?>
                                            <?php $__currentLoopData = $agingSummaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $agingSummary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td> <?php echo e($key); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['current'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['1_15_days'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['16_30_days'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['31_45_days'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['greater_than_45_days'])); ?>

                                                    </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($agingSummary['total_due'])); ?></td>
                                                </tr>

                                                <?php
                                                    $currentTotal += $agingSummary['current'];
                                                    $days15 += $agingSummary['1_15_days'];
                                                    $days30 += $agingSummary['16_30_days'];
                                                    $days45 += $agingSummary['31_45_days'];
                                                    $daysMore45 += $agingSummary['greater_than_45_days'];
                                                    $total += $agingSummary['total_due'];

                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($agingSummaries != []): ?>
                                                <tr>
                                                    <th><?php echo e(__('Total')); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($currentTotal)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days15)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days30)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days45)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($daysMore45)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($total)); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                </div>

                                <div class="tab-pane fade fade show" id="aging_details" role="tabpanel"
                                    aria-labelledby="receivable-tab5">
                                    <div class="table-responsive">

                                    <table class="table pc-dt-simple" id="report-aging-details">
                                        <thead>
                                            <tr>
                                                <th><?php echo e(__('Date')); ?></th>
                                                <th><?php echo e(__('Transaction')); ?></th>
                                                <th><?php echo e(__('Type')); ?></th>
                                                <th><?php echo e(__('Status')); ?></th>
                                                <th><?php echo e(__('Customer Name')); ?></th>
                                                <th><?php echo e(__('Age')); ?></th>
                                                <th><?php echo e(__('Amount')); ?></th>
                                                <th><?php echo e(__('Balance Due')); ?></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $currentTotal = 0;
                                                $currentDue = 0;
                                                $days15Total = 0;
                                                $days15Due = 0;

                                                $days30Total = 0;
                                                $days30Due = 0;

                                                $days45Total = 0;
                                                $days45Due = 0;

                                                $daysMore45Total = 0;
                                                $daysMore45Due = 0;

                                                $total = 0;
                                            ?>
                                            <?php if($moreThan45 != []): ?>
                                                <tr>
                                                    <th><?php echo e(__(' > 45 Days')); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $moreThan45; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $daysMore45Total += $value['total_price'];
                                                    $daysMore45Due += $value['balance_due'];
                                                ?>
                                                <tr>
                                                    <td><?php echo e($value['due_date']); ?></td>
                                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($value['invoice_id'])); ?>

                                                    </td>
                                                    <td><?php echo e(__('Invoice')); ?></td>
                                                    <td>
                                                        <?php if($value['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$value['status']])); ?></span>
                                                        <?php elseif($value['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$value['status']])); ?></span>
                                                        <?php elseif($value['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$value['status']])); ?></span>
                                                        <?php elseif($value['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$value['status']])); ?></span>
                                                        <?php elseif($value['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$value['status']])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($value['name']); ?></td>
                                                    <td> <?php echo e($value['age'] . __(' Days')); ?> </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($value['total_price'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($value['balance_due'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($moreThan45 != []): ?>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($daysMore45Total)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($daysMore45Due)); ?></th>
                                                </tr>
                                            <?php endif; ?>


                                            <?php if($days31to45 != []): ?>
                                                <tr>
                                                    <th><?php echo e(__(' 31 to 45 Days')); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $days31to45; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day31to45): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $days45Total += $day31to45['total_price'];
                                                    $days45Due += $day31to45['balance_due'];
                                                ?>
                                                <tr>
                                                    <td><?php echo e($day31to45['due_date']); ?></td>
                                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($day31to45['invoice_id'])); ?>

                                                    </td>
                                                    <td><?php echo e(__('Invoice')); ?></td>
                                                    <td>
                                                        <?php if($day31to45['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day31to45['status']])); ?></span>
                                                        <?php elseif($day31to45['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day31to45['status']])); ?></span>
                                                        <?php elseif($day31to45['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day31to45['status']])); ?></span>
                                                        <?php elseif($day31to45['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day31to45['status']])); ?></span>
                                                        <?php elseif($day31to45['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day31to45['status']])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($day31to45['name']); ?></td>
                                                    <td> <?php echo e($day31to45['age'] . __(' Days')); ?> </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day31to45['total_price'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day31to45['balance_due'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($days31to45 != []): ?>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days45Total)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days45Due)); ?></th>
                                                </tr>
                                            <?php endif; ?>

                                            <?php if($days16to30 != []): ?>
                                                <tr>
                                                    <th><?php echo e(__(' 16 to 30 Days')); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $days16to30; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day16to30): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $days30Total += $day16to30['total_price'];
                                                    $days30Due += $day16to30['balance_due'];
                                                ?>
                                                <tr>
                                                    <td><?php echo e($day16to30['due_date']); ?></td>
                                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($day16to30['invoice_id'])); ?>

                                                    </td>
                                                    <td><?php echo e(__('Invoice')); ?></td>
                                                    <td>
                                                        <?php if($day16to30['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day16to30['status']])); ?></span>
                                                        <?php elseif($day16to30['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day16to30['status']])); ?></span>
                                                        <?php elseif($day16to30['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day16to30['status']])); ?></span>
                                                        <?php elseif($day16to30['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day16to30['status']])); ?></span>
                                                        <?php elseif($day16to30['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day16to30['status']])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($day16to30['name']); ?></td>
                                                    <td> <?php echo e($day16to30['age'] . __(' Days')); ?> </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day16to30['total_price'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day16to30['balance_due'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($days16to30 != []): ?>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days30Total)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days30Due)); ?></th>
                                                </tr>
                                            <?php endif; ?>

                                            <?php if($days1to15 != []): ?>
                                                <tr>
                                                    <th><?php echo e(__(' 1 to 15 Days')); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $days1to15; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day1to15): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $days15Total += $day1to15['total_price'];
                                                    $days15Due += $day1to15['balance_due'];
                                                ?>
                                                <tr>
                                                    <td><?php echo e($day1to15['due_date']); ?></td>
                                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($day1to15['invoice_id'])); ?>

                                                    </td>
                                                    <td><?php echo e(__('Invoice')); ?></td>
                                                    <td>
                                                        <?php if($day1to15['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day1to15['status']])); ?></span>
                                                        <?php elseif($day1to15['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day1to15['status']])); ?></span>
                                                        <?php elseif($day1to15['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day1to15['status']])); ?></span>
                                                        <?php elseif($day1to15['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day1to15['status']])); ?></span>
                                                        <?php elseif($day1to15['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$day1to15['status']])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($day1to15['name']); ?></td>
                                                    <td> <?php echo e($day1to15['age'] . __(' Days')); ?> </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day1to15['total_price'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($day1to15['balance_due'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($days1to15 != []): ?>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days15Total)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($days15Due)); ?></th>
                                                </tr>
                                            <?php endif; ?>

                                            <?php if($currents != []): ?>
                                                <tr>
                                                    <th><?php echo e(__('Current')); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php $__currentLoopData = $currents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $current): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $currentTotal += $current['total_price'];
                                                    $currentDue += $current['balance_due'];
                                                ?>
                                                <tr>
                                                    <td><?php echo e($current['due_date']); ?></td>
                                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($current['invoice_id'])); ?>

                                                    </td>
                                                    <td><?php echo e(__('Invoice')); ?></td>
                                                    <td>
                                                        <?php if($current['status'] == 0): ?>
                                                            <span
                                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$current['status']])); ?></span>
                                                        <?php elseif($current['status'] == 1): ?>
                                                            <span
                                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$current['status']])); ?></span>
                                                        <?php elseif($current['status'] == 2): ?>
                                                            <span
                                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$current['status']])); ?></span>
                                                        <?php elseif($current['status'] == 3): ?>
                                                            <span
                                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$current['status']])); ?></span>
                                                        <?php elseif($current['status'] == 4): ?>
                                                            <span
                                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$current['status']])); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e($current['name']); ?></td>
                                                    <td> - </td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($current['total_price'])); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($current['balance_due'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($currents != []): ?>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($currentTotal)); ?></th>
                                                    <th><?php echo e(\Auth::user()->priceFormat($currentDue)); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if($currents != [] || $days1to15 != [] || $days16to30 != [] || $days31to45 != [] || $moreThan45 != []): ?> 
                                            <tr>
                                                <th><?php echo e(__('Total')); ?></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><?php echo e(\Auth::user()->priceFormat($currentTotal + $days15Total + $days30Total + $days45Total + $daysMore45Total)); ?>

                                                </th>
                                                <th><?php echo e(\Auth::user()->priceFormat($currentDue + $days15Due + $days30Due + $days45Due + $daysMore45Due)); ?>

                                                </th>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\erpg\resources\views/report/receivable_report.blade.php ENDPATH**/ ?>