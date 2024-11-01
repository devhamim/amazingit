
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" rel="icon" />
    <title>{{ $order->first()->order_id }}-{{$order->first()->status}}</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
======================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('invoice/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('invoice/all.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('invoice/stylesheet.css')}}" />
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container" @click="print">
        <div class="invoice_page">
            <!-- Header -->
            <header>
                <div class="row align-items-center gy-3">
                    <div class="col-sm-7 text-center text-sm-start">
                        <img id="logo" src="{{ asset('uploads/setting') }}/{{ $setting->first()->logo }}" title="Koice" alt="Koice" />
                    </div>
                    <div class="col-sm-5 text-center text-sm-end">
                        <h3 class="text-4 mb-0"><strong>Corporate Office :</strong></h3>
                        <p style="margin-bottom: 0">{{ $setting->first()->address }}</p>
                        <p style="margin-bottom: 0">{{ $setting->first()->phone }}</p>
                    </div>
                </div>
                <hr>
            </header>

            <!-- Main Content -->
            <main>
                <div class="row">
                    <div class="col-sm-6">
                        <strong>Order Date:</strong> {{ $order->first()->created_at->format('Y-m-d') }}<br/>
                        <strong>Delivery Date:</strong> {{ $order->first()->delivery_date }}<br/>
                        <strong>Invoice No:</strong> #{{ $order->first()->order_id }}
                    </div>
                    <div class="col-sm-6 text-sm-end">
                            @if ($order->first()->status == 0)
                                <strong class="bg-default px-2 w-50">Pending</strong>
                            @elseif ($order->first()->status == 2)
                                <strong class="bg-info text-white px-2 w-50">On Going</strong>
                            @elseif ($order->first()->status == 3)
                                <strong class="bg-warning text-white px-2 w-50">Due Payment</strong>
                            @elseif ($order->first()->status == 4)
                                <strong class="bg-secondary text-white px-2 w-50">Refund payment</strong>
                            @elseif ($order->first()->status == 5)
                                <strong class="bg-success text-white px-2 w-50">Completed</strong>
                            @else
                                <strong class="bg-danger text-white px-2 w-50">Canceled</strong>
                            @endif
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Contact:</strong>
                        <address>
                            {{ $billingdetails->first()->customer_name }}<br />
                            {{ $billingdetails->first()->customer_phone }}<br />
                            @if ($billingdetails->first()->customer_email != null)
                                {{ $billingdetails->first()->customer_email }}
                            @endif
                        </address>
                    </div>
                    <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                        <address>
                            {{ $billingdetails->first()->busines_name }}<br />
                            {{ $billingdetails->first()->customer_address }}
                        </address>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border mb-0">
                        <thead>
                            <tr class="bg-light">
                                <td class="col-3"><strong>SL.</strong></td>
                                <td class="col-4"><strong>Service/Product</strong></td>
                                <td class="col-2 text-center"><strong>Rate</strong></td>
                                <td class="col-1 text-center"><strong>QTY</strong></td>
                                <td class="col-2 text-end"><strong>Amount</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($OrderProducts as $sl=>$Order)
                                <tr>
                                    <td class="col-3">{{ $sl+1 }}</td>
                                    <td class="col-4 text-1">{{ $Order->rel_to_product->product_name }}</td>
                                    <td class="col-2 text-center">{{$Order->rel_to_product->product_discount}}Tk</td>
                                    <td class="col-1 text-center">{{ $Order->quantity }}</td>
                                    <td class="col-2 text-end">{{ $Order->rel_to_product->product_discount*$Order->quantity }}Tk</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table border border-top-0 mb-0">
                        <tr class="bg-light">
                            <td class="text-end"><strong>Sub Total:</strong></td>
                            <td class="col-sm-2 text-end">{{ $order->first()->sub_total }}Tk</td>
                        </tr>
                        <tr class="bg-light">
                            <td class="text-end"><strong>Discount:</strong></td>
                            <td class="col-sm-2 text-end">{{ $order->first()->discount }}Tk</td>
                        </tr>
                        <tr class="bg-light">
                            <td class="text-end"><strong>Paid:</strong></td>
                            <td class="col-sm-2 text-end">{{ $order->first()->paid }}Tk</td>
                        </tr>
                        <tr class="bg-light">
                            <td class="text-end"><strong>Due:</strong></td>
                            <td class="col-sm-2 text-end">{{ $order->first()->due }}Tk</td>
                        </tr>
                    </table>
                </div>
            </main>
            <!-- Footer -->
            <footer class="text-center mt-4">
                <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical
                    signature.</p>
                <div class="btn-group btn-group-sm d-print-none"> <a href="javascript:window.print()"
                        class="btn btn-light border text-black-50 shadow-none"><i class="fa fa-print"></i> Print &
                        Download</a> </div>
            </footer>
            <section class="sub_company">
                <div class="footer_img">
                    <img src="{{asset('invoice/img/111.png')}}" alt="">
                </div>
            </section>
        </div>
    </div>

    {{-- <script>
        function printInvoice() {
            window.print();
        }
        window.onload = printInvoice;
    </script> --}}

    <script>
        var isPrinted = false;

        function printInvoice() {
            window.print();
        }

        function handleAfterPrint() {
            if (isPrinted) {
                window.location.href = "{{ route('orders.list') }}";
            }
        }
        window.addEventListener('afterprint', handleAfterPrint);
        function handleKeyPress(event) {
            if (event.key !== undefined) {
                printInvoice();
            }
        }
        window.onload = printInvoice;
        function onPrintStart() {
            isPrinted = true;
        }
        window.onbeforeprint = onPrintStart;
    </script>

</body>

</html>
