@extends('layouts.dashboard')

@section('content')
<div class="container-fluid flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between">
        <h4 class="font-weight-bold py-3 mb-0">Application</h4>
        {{-- <form action="{{ route('home') }}" method="GET">
        @csrf

            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" value="{{ $defaultStartDate }}" optional>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" value="{{ $defaultEndDate }}" optional>

            <button type="submit">Filter</button>
        </form> --}}
        <div class="filter row">
            <div class="col-lg-10">
                <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                    <i class="fa fa-calendar"></i>&nbsp;
                    <span></span> <i class="fa fa-caret-down"></i>
                 </div>
            </div>
            <div class="col-lg-2">
                <form action="{{ route('home') }}" method="GET">
                    <!-- ... (other form fields) -->
                    <input type="hidden" name="start_date" id="start_date" value="{{ $defaultStartDate }}">
                    <input type="hidden" name="end_date" id="end_date" value="{{ $defaultEndDate }}">
                    <button type="submit">Filter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="text-muted small mt-0 mb-4 d-block breadcrumb d-flex justify-between">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item ">Dashboard</li>
            <li class="breadcrumb-item active">Application</li>
        </ol>
    </div>

    <div class="row">
        @if (Auth::user()->role == 1)
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a>
                    <div class="card border-3 border-top border-top-success">
                        <div class="card-body">
                            <h5 class="text-info">Total Staff</h5>
                            <div class="metric-value d-inline-block">
                                <h3 class="mb-1">{{ $users_count }}</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endif

        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a>
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Customers</h5>
                        <div class="metric-value d-inline-block">
                            <h3 class="mb-1">{{ $customers_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <a href="{{ route('product.list') }}">
                <div class="card border-3 border-top border-top-success">
                    <div class="card-body">
                        <h5 class="text-info">Total Product</h5>
                        <div class="metric-value d-inline-block">
                            <h3 class="mb-1">{{ $products_count }}</h3>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
            foreach ($month_order as $order) {
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
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-secondary">Total P. Price</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_p_price) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-secondary">Total P. Discount</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_p_discount) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-secondary">Total Amount</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_amount) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-info">Total Payment</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_payment) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-warning">Total Due</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_due) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-danger">Total R. payment</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_refund) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="card border-3 border-top border-top-success">
                <div class="card-body">
                    <h5 class="text-success">Total Blance</h5>
                    <div class="metric-value d-inline-block">
                        <h3 class="mb-1">৳{{ number_format($total_blance) }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
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
        <!-- Data card 8 Start -->
        <div class="col-xl-8 col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Recent Orders</h5>
                <div class="table-responsive">
                    <table class="table table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Date</th>
                                <th>C. Name</th>
                                <th>C. Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($month_order->take(5) as $sl=>$orders)
                            <tr>
                                <td>{{ $sl+1 }}</td>
                                <td>{{ $orders->created_at->format('d M Y') }}</td>
                                @if ($orders->rel_to_billing)
                                    <td>{{ $orders->rel_to_billing->customer_name }}</td>
                                    <td>{{ $orders->rel_to_billing->customer_phone }}</td>
                                @endif
                                <td>{{ $orders->created_at->format('d-M-Y') }}</td>
                                <td>
                                    <label class="label label-warning">
                                        @if ($orders->status == 0)
                                            <div class="badge badge-default">Pending</div>
                                        @elseif ($orders->status == 2)
                                            <div class="badge badge-info">On Going</div>
                                        @elseif ($orders->status == 3)
                                            <div class="badge badge-warning">Due Payment</div>
                                        @elseif ($orders->status == 4)
                                            <div class="badge badge-secondary">Refund Payment</div>
                                        @elseif ($orders->status == 5)
                                            <div class="badge badge-success">Completed</div>
                                        @else
                                            <div class="badge badge-danger">Canceled</div>
                                        @endif
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <h5 class="card-header">Today's Report</h5>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Orders</th>
                            <td>{{ $todayOrders }}</td>
                        </tr>
                        @foreach($statusCounts as $status => $count)
                            <tr>
                                <th>{{ ucfirst($status) }}</th>
                                <td>{{ $count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

