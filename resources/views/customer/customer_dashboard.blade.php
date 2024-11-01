@extends('customer.layout.app')
@section('title', 'Nugortech IT - Customer Dashboard')
@section('meta_title', 'Nugortech IT - Customer Dashboard')
@section('content')
<div class="ec-side-cart-overlay"></div>
<div id="ec-side-cart" class="ec-side-cart">
    <div class="ec-cart-inner">
        <div class="ec-cart-top">
            <div class="ec-cart-title">
                <span class="cart_title">My Cart</span>
                <button class="ec-close">×</button>
            </div>
            <ul class="eccart-pro-items">
                <li>
                    <a href="#" class="sidekka_pro_img"><img
                            src="{{ asset('customer') }}/images/product-image/6_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="#" class="cart_pro_title">T-shirt For Women</a>
                        <span class="cart-price"><span>$76.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidekka_pro_img"><img
                            src="{{ asset('customer') }}/images/product-image/12_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="#" class="cart_pro_title">Women Leather Shoes</a>
                        <span class="cart-price"><span>$64.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="#" class="sidekka_pro_img"><img
                            src="{{ asset('customer') }}/images/product-image/3_1.jpg" alt="product"></a>
                    <div class="ec-pro-content">
                        <a href="#" class="cart_pro_title">Girls Nylon Purse</a>
                        <span class="cart-price"><span>$59.00</span> x 1</span>
                        <div class="qty-plus-minus">
                            <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                        </div>
                        <a href="javascript:void(0)" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ec-cart-bottom">
            <div class="cart-sub-total">
                <table class="table cart-table">
                    <tbody>
                        <tr>
                            <td class="text-left">Sub-Total :</td>
                            <td class="text-right">$300.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">VAT (20%) :</td>
                            <td class="text-right">$60.00</td>
                        </tr>
                        <tr>
                            <td class="text-left">Total :</td>
                            <td class="text-right primary-color">$360.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="cart_btn">
                <a href="#" class="btn btn-primary">View Cart</a>
                <a href="#" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- ekka Cart End -->

<!-- Ec breadcrumb start -->
<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">User Profile</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- ec-breadcrumb-list start -->
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="ec-breadcrumb-item active">Profile</li>
                        </ul>
                        <!-- ec-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Ec breadcrumb end -->

<!-- User profile section -->
<section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                <div class="ec-sidebar-wrap ec-border-box">
                    <!-- Sidebar Category Block -->
                    <div class="ec-sidebar-block">
                        <div class="ec-vendor-block">
                            <!-- <div class="ec-vendor-block-bg"></div>
                            <div class="ec-vendor-block-detail">
                                <img class="v-img" src="{{ asset('customer') }}/images/user/1.jpg" alt="vendor image">
                                <h5>Mariana Johns</h5>
                            </div> -->
                            <div class="ec-vendor-block-items">
                                <ul>
                                    <li><a href="{{ route('customer.dashboard') }}">User Profile</a></li>
                                    <li><a href="{{ route('customer.order.history') }}">Service Order</a></li>
                                    <li><a href="{{ route('customer.shop.history') }}">Product Order</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ec-shop-rightside col-lg-9 col-md-12">
                <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                    <div class="ec-vendor-card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ec-vendor-block-profile">
                                    <div class="ec-vendor-block-img space-bottom-30">
                                        <div class="ec-vendor-block-bg" style="background: {{ asset('customer/images/8.jpg') }}">
                                        </div>
                                        <div class="ec-vendor-block-detail">
                                            <img class="v-img" src="{{ asset('customer') }}/images/user/1.jpg" alt="vendor image">
                                            <h5 class="name">{{ Auth::guard('customerauth')->user()->customer_name }}</h5>
                                            <p>{{ Auth::guard('customerauth')->user()->busines_name }}</p>
                                        </div>
                                        <p>Hello <span>{{ Auth::guard('customerauth')->user()->customer_name }}</span></p>
                                        <p>From your account you can easily view and track orders. You can manage and change your account information like address, contact information and history of orders.</p>
                                    </div>
                                    <h5>Account Information</h5>

                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                <h6>E-mail address <a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"></a></h6>
                                                <ul>
                                                    <li><strong>Email : </strong>{{ Auth::guard('customerauth')->user()->customer_email }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                <h6>Contact nubmer<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"></a></h6>
                                                <ul>
                                                    <li><strong>Phone Nubmer : </strong>{{ Auth::guard('customerauth')->user()->customer_phone }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                <h6>Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"></a></h6>
                                                <ul>
                                                    <li><strong>Address : </strong>{{ Auth::guard('customerauth')->user()->customer_address }}</li>
                                                </ul>
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
</section>

  <!-- Modal -->
  <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="ec-vendor-block-img space-bottom-30">
                        <div class="ec-vendor-block-bg cover-upload">
                            <div class="thumb-upload">
                                <div class="thumb-edit">
                                    <input type='file' id="thumbUpload01" class="ec-image-upload"
                                        accept=".png, .jpg, .jpeg" />
                                    <label></label>
                                </div>
                                <div class="thumb-preview ec-preview">
                                    <div class="image-thumb-preview">
                                        <img class="image-thumb-preview ec-image-preview v-img"
                                            src="{{ asset('customer') }}/images/banner/8.jpg" alt="edit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-block-detail">
                            <div class="thumb-upload">
                                <div class="thumb-edit">
                                    <input type='file' id="thumbUpload02" class="ec-image-upload"
                                        accept=".png, .jpg, .jpeg" />
                                    <label></label>
                                </div>
                                <div class="thumb-preview ec-preview">
                                    <div class="image-thumb-preview">
                                        <img class="image-thumb-preview ec-image-preview v-img"
                                            src="{{ asset('customer') }}/images/user/1.jpg" alt="edit" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ec-vendor-upload-detail">
                            <form class="row g-3" action="#" method="POST">
                                @csrf
                                <div class="col-md-12 space-t-15">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" class="form-control" name="customer_name" value="{{ Auth::guard('customerauth')->user()->customer_name }}">
                                </div>
                                <div class="col-md-12 space-t-15">
                                    <label class="form-label">Business Name</label>
                                    <input type="text" class="form-control" name="busines_name" value="{{ Auth::guard('customerauth')->user()->busines_name }}">
                                </div>
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="customer_email" value="{{ Auth::guard('customerauth')->user()->customer_email }}">
                                </div>
                                <div class="col-md-6 space-t-15">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control" name="customer_phone" value="{{ Auth::guard('customerauth')->user()->customer_phone }}">
                                </div>
                                <div class="col-md-12 space-t-15">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="customer_address" value="{{ Auth::guard('customerauth')->user()->customer_address }}">
                                </div>

                                <div class="col-md-12 space-t-15">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                        aria-label="Close">Close</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection

