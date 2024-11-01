@extends('layouts.dashboard')
@section('content')
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper" style="padding-right: 20px">
    <div class="dashboard-ecommerce">
        <div class=" dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="font-weight-bold py-3 mb-0">All Orders</h4>
                            <div class="filter row">
                                <div class="col-lg-10">
                                    <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                        </div>
                                </div>
                                <div class="col-lg-2">
                                    <form action="{{ route('orders.list') }}" method="GET">
                                        <!-- ... (other form fields) -->
                                        <input type="hidden" name="start_date" id="start_date" value="{{ $defaultStartDate }}">
                                        <input type="hidden" name="end_date" id="end_date" value="{{ $defaultEndDate }}">
                                        <button type="submit">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="{{ url('/') }}"
                                            class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 col-3 text-end">
                        <form action="{{ route('multi.view.invoice') }}" method="post" id="all_print_form">
                            @csrf

                            <input type="hidden" name="print_data" id="checked_value">
                            <div class="form-group">
                                <button type="submit" id="bulk_print_btn" class="btn btn-info btn-sm">Print Invoice</button>
                            </div>
                        </form>
                </div>

                <div class="col-md-5 col-5">

                    <form action="{{ route('excel.exportOrdersReport') }}" method="post" id="all_courier_csv">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="status" id="courier_status">
                            <input type="hidden" id="all_ord_id" name="all_ord_id">
                            <button type="submit" id="steadfast_csv" class="btn btn-success btn-sm">Stead Fast
                                Export
                            </button>
                            <button type="submit" id="redex_csv" class="btn btn-danger btn-sm">Redex Export
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-4 mt-md-0 mt-2">
                    <form action="{{ route('orders.courier.list') }}" method="get" class="form-inline float-md-right">
                        <div class="form-group">
                            <input type="hidden" name="status" value="">
                            <select name="lead_customer" id="lead_customer" class="form-control mr-2">
                                <option value="">Select Channel</option>
                                    @foreach ($couriers as $courier)
                                        <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                    @endforeach
                            </select>
                            <button class="btn btn-success">Search</button>
                            <a href="{{ route('orders.list') }}" class="btn btn-secondary mx-2">Reset</a>
                        </div>
                    </form>
                </div>

            </div>
            <div class="row mb-md-4 mb-3">
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list') }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-primary">Total Order</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_orders }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 0) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-grey">Total Pending</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_pending }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 2) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-info">Total On Going</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_in_review }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 3) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-warning">Total Due Payment</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_due_payment }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 4) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-secondary">Total Refund</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_refund_payment }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 5) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-success">Total Completed</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_completed }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <a href="{{ route('orders.list.status', 6) }}">
                        <div class="card border-3 border-top border-top-success">
                            <div class="card-body">
                                <h5 class="text-danger">Total Canceled</h5>
                                <div class="metric-value d-inline-block">
                                    <h3 class="mb-1">{{ $total_canceled }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @php
                    $total_p_price = 0;
                    $total_p_discount = 0;
                    $total_amount = 0;
                    $total_payment = 0;
                    $total_due = 0;
                    $total_refund = 0;
                    $total_blance = 0;
                    $total_commission = 0;
                    foreach ($order_id as $order) {
                        $total_p_price += $order->sub_total;
                        $total_p_discount += $order->discount;
                        $total_amount += $order->sub_total-$order->discount;
                        $total_payment += $order->paid;
                        // $total_due += $order->due;
                    }
                    $total_due = $total_amount-$total_payment;
                    foreach ($refund_payment as $refund) {
                        $total_refund += $refund->paid;
                    }
                    $total_blance = $total_payment-$total_refund;
                    $total_commission = $total_blance*5/100;
                @endphp
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-secondary">Total P. Price</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_p_price) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-secondary">Total P. Discound</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_p_discount) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-secondary">Total Amount</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_amount) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-info">Total Payment</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_payment) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-warning">Total Due</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_due) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-danger">Total Refund Pay</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_refund) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-success">Total Blance</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_blance) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 ">
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-success">Total Commission</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">৳{{ number_format($total_commission) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row mt-5">
                <div class="col-12">
                    <div class="card ">
                        <div class="card-body table-responsive">
                            <table id="report-table" class="table table-bordered table-striped text-center">
                                <thead>
                                <tr>

                                    <th></th>
                                    <th>SL.</th>
                                    <th>Invoice ID</th>
                                    <th>Customer Info</th>
                                    <th>Products</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Addad By</th>
                                    <th>Company</th>
                                    <th>D. Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_id as $sl=>$order)
                                    <tr id="tr_{{ $order->id }}">
                                        <td>
                                            <input type="checkbox" name="checkbox" class="sub_chk" data-id="{{ $order->id }}">
                                        </td>
                                        <td>{{ $sl+1 }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>
                                            <span> {{ $order->rel_to_billing ? $order->rel_to_billing->customer_name : 'No Billing Details' }}</span>
                                            <br>
                                            <a href="tel: {{ $order->rel_to_billing ? $order->rel_to_billing->customer_phone : 'No Billing Details' }}"><span>{{ $order->rel_to_billing ? $order->rel_to_billing->customer_phone : 'No Billing Details' }}</span></a>
                                            <br>
                                            <span>{{ $order->rel_to_billing ? $order->rel_to_billing->customer_address : 'No Billing Details' }}</span>
                                            <br>
                                            <span>{{ $order->rel_to_billing ? $order->rel_to_billing->busines_name : 'No Busines Name' }}</span>
                                            <br>
                                        </td>
                                        <td>
                                            @foreach ($order->rel_to_orderpro as $OrderProduct)
                                                @if ($OrderProduct != null)
                                                    {{ $OrderProduct->quantity }} x {{ $OrderProduct->rel_to_product->product_name }} <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>৳ {{ $order->discount }}</td>
                                        <td>৳ {{ $order->sub_total-$order->discount }}</td>
                                        <td>৳ {{ $order->paid }}</td>
                                        <td>৳ {{ $order->due }}</td>
                                        <td>
                                            @if ($order->rel_to_user != null)
                                                {{ $order->rel_to_user->name }}
                                            @else
                                                Null
                                            @endif
                                        </td>
                                        <td>{{ $order->company_name }}</td>
                                        <td>{{$order->delivery_date}}
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown mx-1">
                                                    @if ($order->status == 0)
                                                        <div class="badge badge-default">Pending</div>
                                                    @elseif ($order->status == 2)
                                                        <div class="badge badge-info">On Going</div>
                                                    @elseif ($order->status == 3)
                                                        <div class="badge badge-warning">Due Payment</div>
                                                    @elseif ($order->status == 4)
                                                        <div class="badge badge-secondary">Refund payment</div>
                                                    @elseif ($order->status == 5)
                                                        <div class="badge badge-success">Completed</div>
                                                    @else
                                                        <div class="badge badge-danger">Canceled</div>
                                                    @endif
                                            </div>
                                        </td>
                                        {{-- <td>Mr. Employee</td> --}}

                                        <td class="text-center">
                                            {{-- <a href="{{ route('invoice.download', $order->id) }}" class="d-block mb-1 print" data-id="12"><i class="fa fa-print"></i></a> --}}
                                            <a href="{{ route('view.invoice', $order->order_id) }}" class="d-block mb-1 print" data-id="{{ $order->id }}"><i class="fa fa-print"></i></a>

                                            <a href="{{ route('orders.edit', $order->order_id) }}" class="d-block mb-1">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('orders.delete', $order->order_id) }}" class="d-block mb-1" onclick="return confirm('Are you sure to delete this?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="mt-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script type="text/javascript">
$(document).ready(function () {
    var start_date = '{{ $defaultStartDate }}';
    var end_date = '{{ $defaultEndDate }}';

    if (start_date && end_date) {
        start_date = moment(start_date, 'YYYY-MM-DD');
        end_date = moment(end_date, 'YYYY-MM-DD');
    } else {
        start_date = moment().subtract(6, 'days');
        end_date = moment();
    }

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#start_date').val(start.format('YYYY-MM-DD'));
        $('#end_date').val(end.format('YYYY-MM-DD'));
    }

    $('#reportrange').daterangepicker({
        startDate: start_date,
        endDate: end_date,
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start_date, end_date);
});
</script>
@endsection
{{-- <script>
document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('.sub_chk');
    let checked_value = document.getElementById('checked_value');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var checkedIDs = [];
            var checkedCheckboxes = document.querySelectorAll('.sub_chk:checked');

            checkedCheckboxes.forEach(function(checkedCheckbox) {
                checkedIDs.push(checkedCheckbox.getAttribute('data-id'));
            });

            checked_value.value = checkedIDs.join(', ');
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var checkboxes = document.querySelectorAll('.sub_chk');
    let checked_value = document.getElementById('all_ord_id');

    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var checkedIDs = [];
            var checkedCheckboxes = document.querySelectorAll('.sub_chk:checked');

            checkedCheckboxes.forEach(function(checkedCheckbox) {
                checkedIDs.push(checkedCheckbox.getAttribute('data-id'));
            });

            checked_value.value = checkedIDs.join(', ');
        });
    });
});
</script> --}}
{{-- <script>
$('.print').on('click', function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        }
    });

    $.ajax({
        url: '/getprints',
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: $(this).data('id')},
        success: function (data) {
            newWin = window.open("");
            newWin.document.write(data);
            newWin.document.close();
        }
    });
});
</script> --}}

{{-- <script>
//courier export
$('#steadfast_csv').on('click', function (e) {
    var allVals = [];
    $(".sub_chk:checked").each(function () {
        allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
        alert("Please select row.");
    } else {
        $('#all_ord_id').val(allVals);
        $('#courier_status').val(1);
        $('#all_courier_csv').submit();
    }
});

$('#redex_csv').on('click', function (e) {
    var allVals = [];
    $(".sub_chk:checked").each(function () {
        allVals.push($(this).attr('data-id'));
    });

    if (allVals.length <= 0) {
        alert("Please select row.");
    } else {
        $('#all_ord_id').val(allVals);
        $('#courier_status').val(2);
        $('#all_courier_csv').submit();
    }
});

</script> --}}
