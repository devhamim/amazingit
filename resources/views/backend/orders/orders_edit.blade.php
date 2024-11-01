@extends('layouts.dashboard')
@section('content')

    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Edit Order</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->

                <div class="row mb-2">
                    <div class="col-12">
                        <a href="{{ route('orders.list') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-angle-double-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <form action="{{ route('orders.update') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="d-flex" style="justify-content: space-between">
                                    <h4 class="card-header">Customer Info</h4>
                                    <p class="card-header">Order Date: {{ $orders->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-12">
                                            <input type="hidden" name="order_id" value="{{ $orders->order_id }}">
                                            <label for="delivery_date">Delivery Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control datetimepicker" value="{{ $orders->delivery_date }}" id="delivery_date" name="delivery_date" required>
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="invoice_id">Invoice ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="invoice_id" name="invoice_id" value="{{ $orders->order_id }}" readonly required>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_name">Customer Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $billingdetails->customer_name ?? '' }}" required>
                                            @error('customer_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="busines_name">Busines Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="busines_name" name="busines_name" value="{{ $billingdetails->busines_name ?? '' }}" required>
                                            @error('busines_name')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_email">Customer Email</label>
                                            <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ $billingdetails->customer_email ?? '' }}">
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label for="customer_phone">Customer Phone <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ $billingdetails->customer_phone ?? '' }}" required>
                                            @error('customer_phone')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="customer_address">Customer Address</label>
                                            <textarea name="customer_address" id="customer_address" class="form-control">{{ $billingdetails->customer_address ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="company_name">Company Name</label>
                                            <select name="company_name" id="company_name" class="form-control select2">
                                                <option value="amaizingIT"{{$orders->company_name == 'amaizingIT'?'selected':'' }}>Amaizing IT</option>
                                                <option value="CreativeArtistZ" {{$orders->company_name == 'CreativeArtistZ'?'selected':'' }}>Creative ArtistZ</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="lead_customer">Lead Customer</label>
                                            <select name="lead_customer" id="lead_customer" class="form-control select2">
                                                <option value="">Select A Lead</option>
                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->id }}"{{ $courier->id == $orders->lead_customer?'selected':'' }}>{{ $courier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="" class="form-label">Order status</label>
                                        <select name="status" class="form-control">
                                            <option value="0" {{ $orders->status == 0?'selected':'' }}>Pending</option>
                                            <option value="2" {{ $orders->status == 2?'selected':'' }}>On Going</option>
                                            <option value="3" {{ $orders->status == 3?'selected':'' }}>Due Payment</option>
                                            <option value="4" {{ $orders->status == 4?'selected':'' }}>Refund payment</option>
                                            <option value="5" {{ $orders->status == 5?'selected':'' }}>Completed</option>
                                            <option value="6" {{ $orders->status == 6?'selected':'' }}>Canceled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h4 class="card-header">Product Info</h4>
                                <div class="card-body">
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Product Name</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th></th>
                                            </tr>
                                            </thead>

                                            <tbody id="prod_row">
                                                @foreach ($orderproduct as $orderpro)
                                                    <tr>
                                                        <td>{{ $orderpro->rel_to_product->sku }}</td>
                                                        <td>
                                                            <input type="hidden" name="product_id[]" value="{{ $orderpro->rel_to_product->id }}">
                                                            <input type="text" readonly class="form-control" value="{{ $orderpro->rel_to_product->product_name }}">
                                                        </td>
                                                        <td>
                                                            <input style="width: 60px; border: solid solid #ddd;" min="1"  type="number" class="form-control qty" name="quantity[]" value="{{ $orderpro->quantity }}">
                                                            <input type="hidden" name="price[]" class="price" value="{{ $orderpro->rel_to_product->product_discount }}">
                                                        </td>
                                                        <td class="total_price">{{ $orderpro->rel_to_product->product_discount*$orderpro->quantity }}</td>
                                                        <td><a class="btn btn-danger" href="{{ route('orders.product.delete',$orderpro->id) }}">Remove</a></td></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody>
                                            <tr>
                                                <td colspan="5">
                                                    <div class="form-row">
                                                        <div class="form-group col-12 text-left">
                                                            <select id="product" class="form-control select2" required>
                                                                    <option value="">Select A Product</option>
                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}" {{ $product->id == $orderproducts->product_id?'selected':'' }}>{{ $product->product_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="sub_total" class="offset-md-6 col-md-2 col-form-label text-right">Sub Total</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="sub_total" name="sub_total" min="0" value="{{ $orders->sub_total }}" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="discount" class="offset-md-6 col-md-2 col-form-label text-right">Discount</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" id="discount" min="0" name="discount" value="{{ $orders->discount }}">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="paid" class="offset-md-6 col-md-2 col-form-label text-right">Paid</label>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" id="paid" min="0" name="paid" value="{{ $orders->paid }}">
                                        </div>
                                    </div>

                                    <div class="form-group row" style="padding: 6px 0;">
                                        <label for="due" class="offset-md-6 col-md-2 col-form-label text-right">Due</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" id="due" min="0" name="due" value="{{ $orders->due }}" readonly>
                                        </div>
                                    </div>
                                    {{-- ===================== --}}

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <textarea name="order_note" id="order_note" class="form-control" placeholder="Order Note">{{ $orders->order_note }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12 text-center">
                                            <input type="submit" value="Save" class="btn btn-success w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

<script>
     $(document).ready(function () {
    $('.datetimepicker').datetimepicker({
            icons:
                {
                    next: 'fa fa-angle-right',
                    previous: 'fa fa-angle-left'
                },
            format: 'DD-MM-YYYY',
            defaultDate: new Date(),
        });
    });
</script>

<script>
    $('.select2').select2();
</script>

<script>
    $(document).ready(function () {
    $('#product').on('change', function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN
            }
        });

        $.ajax({
            url: '/getProduct',
            type: 'POST',
            data: {_token: CSRF_TOKEN, id: $(this).val()},
            success: function (data) {
                var newRowHtml = '<tr>' +
                    '<td>' + (data.sku ? data.sku : 'null') + '</td>' +
                    '<td>' +
                    '<input type="hidden" name="product_id[]" value="' + (data.product_id ? data.product_id : '') + '">' +
                    '<input type="text" class="form-control" value="' + (data.productName ? data.productName : '') + '" readonly>' +
                    '</td>' +
                    '<td>' +
                    '<input style="width: 60px; border: 1px solid #ddd;" min="1" type="number" class="form-control qty" name="quantity[]" value="1">' +
                    '<input type="hidden" name="price[]" class="price" value="' + (data.product_price ? data.product_price : '') + '">' +
                    '</td>' +
                    '<td class="total_price">' + ((data.product_price ? data.product_price : 0) * 1).toFixed(2) + '</td>' +
                    '<td><button class="btn btn-danger" onclick="removeProduct(this)">Remove</button></td>' +
                    '</tr>';

                $('#prod_row').append(newRowHtml);

                updateTotals();
            }
        });
    });

    $(document).on('input', '.qty', function () {
        updateRowTotal($(this));
    });

    $(document).on('input', '#discount, #paid', function () {
        updateTotals();
    });

    function updateRowTotal(input) {
        var row = input.closest('tr');
        var productPrice = parseFloat(row.find('.price').val());
        var quantity = parseFloat(input.val());
        var totalCell = row.find('.total_price');
        var newTotal = productPrice * quantity;
        totalCell.text(newTotal.toFixed(2));

        updateTotals();


        var productId = row.find('input[name="product_id[]"]').val();
        updateOrderProduct(productId, quantity);
    }

    function updateTotals() {
        var subTotal = 0;

        $('.total_price').each(function () {
            subTotal += parseFloat($(this).text());
        });

        $('#sub_total').val(subTotal.toFixed(2));

        var total = subTotal - parseFloat($('#discount').val()) - parseFloat($('#paid').val());
        $('#due').val(total.toFixed(2));

        finalCalc();
    }

    $('#paid').on('input', function () {
        updateTotals();
    });

    window.removeProduct = function (button) {
        var row = $(button).closest('tr');
        row.remove();
        updateTotals();
    };
});

</script>

@endsection
