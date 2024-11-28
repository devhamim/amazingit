<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\bannerContoller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CliendController;
use App\Http\Controllers\ConsultancyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TermsconditionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\shippingMethodsController;
use App\Http\Controllers\courierController;
use App\Http\Controllers\mediaController;
use App\Http\Controllers\OrderslistController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\customerdashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\printInvoiceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\pandingcustomerdashboard;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProtfolioController;
use App\Http\Controllers\ServiceProductOrderController;
use App\Http\Controllers\ShopcategoryController;
use App\Http\Controllers\ShopOrderController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestmonialController;
use App\Http\Controllers\WhatsappController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [FrontendController::class, 'home'])->name('site');


// Auth::routes();
// routes/web.php


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/clear/all/cash', [HomeController::class, 'clear_all_cash'])->name('clear.all.cash');

// Custom login route
Route::get('/system/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/system/login', 'App\Http\Controllers\Auth\LoginController@login');

// Custom logout route
Route::post('/system/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// User
Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/user/profile/update', [UserController::class, 'profile_update'])->name('profile.update');
Route::get('/user/list', [UserController::class, 'users'])->name('users');
Route::get('/user/delete/{user_id}', [UserController::class, 'user_delete'])->name('user.delete');
Route::post('/user/register', [UserController::class, 'user_register'])->name('user.register');
// Route::get('/user/edit/{user_id}', [UserController::class, 'user_edit'])->name('user.edit');
Route::post('/user/update', [UserController::class, 'user_update'])->name('user.update');
Route::post('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
Route::get('/user/order/view', [UserController::class, 'user_order_view'])->name('user.order.view');
Route::get('/user/orders/view/status/{status}', [UserController::class, 'user_orders_view_status'])->name('user.orders.view.status');
Route::get('/user/customer/list/view', [UserController::class, 'user_customer_list_view'])->name('user.customer.list.view');
Route::get('/user/home/view/{id}', [UserController::class, 'user_home_view'])->name('user.home.view');
Route::get('/return/home', [UserController::class, 'return_home'])->name('return.home');

// shipping methods
Route::get('/shipping/methods', [shippingMethodsController::class, 'shipping_methods'])->name('shipping.methods');
Route::post('/shipping/methods/store', [shippingMethodsController::class, 'shipping_methods_store'])->name('shipping.methods.store');
Route::post('/shipping/methods/update', [shippingMethodsController::class, 'shipping_methods_update'])->name('shipping.methods.update');
Route::post('/editShipping/{id}', [shippingMethodsController::class, 'editShipping'])->name('editShipping');
Route::get('/shipping/methods/delete/{id}', [shippingMethodsController::class, 'shipping_methods_delete'])->name('shipping.methods.delete');

// courier
Route::get('/courier/list', [courierController::class, 'courier_list'])->name('courier.list');
Route::post('/courire/store', [courierController::class, 'courire_store'])->name('courire.store');
Route::post('/editCourier/{id}', [courierController::class, 'editCourier'])->name('editCourier');
Route::post('/courire/update', [courierController::class, 'courire_update'])->name('courire.update');
Route::get('/courire/delete/{id}', [courierController::class, 'courire_delete'])->name('courire.delete');


// testimonial
Route::get('/testimonial/list', [TestmonialController::class, 'testimonial_list'])->name('testimonial.list');
Route::post('/testimonial/store', [TestmonialController::class, 'testimonial_store'])->name('testimonial.store');
Route::post('/edittestimonial/{id}', [TestmonialController::class, 'edittestimonial'])->name('edittestimonial');
Route::post('/testimonial/update', [TestmonialController::class, 'testimonial_update'])->name('testimonial.update');
Route::get('/testimonial/delete/{id}', [TestmonialController::class, 'testimonial_delete'])->name('testimonial.delete');

// team
Route::get('/team/list', [TeamController::class, 'team_list'])->name('team.list');
Route::post('/team/store', [TeamController::class, 'team_store'])->name('team.store');
Route::post('/editteam/{id}', [TeamController::class, 'editteam'])->name('editteam');
Route::post('/team/update', [TeamController::class, 'team_update'])->name('team.update');
Route::get('/team/delete/{id}', [TeamController::class, 'team_delete'])->name('team.delete');

// cliend
Route::get('/cliend/list', [CliendController::class, 'cliend_list'])->name('cliend.list');
Route::post('/cliend/store', [CliendController::class, 'cliend_store'])->name('cliend.store');
Route::post('/editcliend/{id}', [CliendController::class, 'editcliend'])->name('editcliend');
Route::post('/cliend/update', [CliendController::class, 'cliend_update'])->name('cliend.update');
Route::get('/cliend/delete/{id}', [CliendController::class, 'cliend_delete'])->name('cliend.delete');


// media
Route::get('/media/list', [mediaController::class, 'media_list'])->name('media.list');
Route::post('/media/store', [mediaController::class, 'media_store'])->name('media.store');
Route::post('/editmedia/{id}', [mediaController::class, 'editmedia'])->name('editmedia');
Route::post('/media/update', [mediaController::class, 'media_update'])->name('media.update');
Route::get('/media/delete/{id}', [mediaController::class, 'media_delete'])->name('media.delete');

// customer
Route::get('/customer/list', [customerController::class, 'customer_list'])->name('customer.list');
Route::post('/customer/add', [customerController::class, 'customer_add'])->name('customer.add');
Route::get('/customer/delete/{id}', [customerController::class, 'customer_delete'])->name('customer.delete');

// order
Route::get('/orders/list', [OrderslistController::class, 'orders_list'])->name('orders.list');
Route::get('/orders/list/status{status}', [OrderslistController::class, 'orders_list_status'])->name('orders.list.status');
Route::get('/orders/courier/list', [OrderslistController::class, 'orders_courier_list'])->name('orders.courier.list');
Route::get('/orders/add', [OrderslistController::class, 'orders_add'])->name('orders.add');
Route::post('/orders/store', [OrderslistController::class, 'orders_store'])->name('orders.store');
Route::post('/getCities', [OrderslistController::class, 'getCities'])->name('getCities');
Route::post('/getProduct', [OrderslistController::class, 'getProduct'])->name('getProduct');
Route::post('/getProductupdate', [OrderslistController::class, 'getProductupdate'])->name('getProductupdate');
Route::post('/getzone', [OrderslistController::class, 'getzone'])->name('getzone');
Route::post('/status/update', [OrderslistController::class, 'status_update'])->name('status.update');
Route::get('/orders/edit/{order_id}', [OrderslistController::class, 'orders_edit'])->name('orders.edit');
Route::post('/orders/update', [OrderslistController::class, 'orders_update'])->name('orders.update');
Route::get('/orders/delete/{id}', [OrderslistController::class, 'orders_delete'])->name('orders.delete');
Route::get('/orders/exportOrdersReport', [OrderslistController::class, 'orders_exportOrdersReport'])->name('orders.exportOrdersReport');
Route::get('/orders/product/delete/{id}', [OrderslistController::class, 'orders_product_delete'])->name('orders.product.delete');
Route::get('/getcustomerdata/{customerid}', [OrderslistController::class, 'getcustomerdata'])->name('getcustomerdata');

// service prduct order
Route::get('/service/product/order', [ServiceProductOrderController::class, 'service_product_order'])->name('service.product.order');
Route::get('/service/product/order/led', [ServiceProductOrderController::class, 'service_product_order_led'])->name('service.product.order.led');
Route::get('/service/product/order/delete/{id}', [ServiceProductOrderController::class, 'service_product_order_delete'])->name('service.product.order.delete');
Route::post('/service/product/order/update', [ServiceProductOrderController::class, 'service_product_order_update'])->name('service.product.order.update');


// print
Route::get('/order/view-invoice/{orderId}', [printInvoiceController::class, 'view_invoice'])->name('view.invoice');
Route::post('/getclickdatas', [printInvoiceController::class, 'getclickdatas'])->name('getclickdatas');
Route::post('/getprints', [printInvoiceController::class, 'getprints'])->name('getprints');
Route::post('/multi/view/invoice', [printInvoiceController::class, 'multi_view_invoice'])->name('multi.view.invoice');
Route::post('/excel/exportOrdersReport', [printInvoiceController::class, 'excel_exportOrdersReport'])->name('excel.exportOrdersReport');

// pdf
// Route::get('/view/invoice/{orderId}', [PDFController::class, 'view_invoice'])->name('view.invoice');

// Category
Route::get('/category/add', [CategoryController::class, 'category_add'])->name('category.add');
Route::get('/category/list', [CategoryController::class, 'category_list'])->name('category.list');
Route::post('/category/store', [CategoryController::class, 'category_store'])->name('category.store');
Route::get('/category/edit/{category_id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::get('/category/delete/{category_id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::post('/category/update', [CategoryController::class, 'category_update'])->name('category.update');

// banner
Route::get('/banner/add', [bannerContoller::class, 'banner_add'])->name('banner.add');
Route::get('/banner/list', [bannerContoller::class, 'banner_list'])->name('banner.list');
Route::post('/banner/store', [bannerContoller::class, 'banner_store'])->name('banner.store');
Route::get('/banner/edit/{banner_id}', [bannerContoller::class, 'banner_edit'])->name('banner.edit');
Route::get('/banner/delete/{banner_id}', [bannerContoller::class, 'banner_delete'])->name('banner.delete');
Route::post('/banner/update/', [bannerContoller::class, 'banner_update'])->name('banner.update');



// setting
Route::get('/setting/add', [settingController::class, 'setting_add'])->name('setting.add');
Route::post('/setting/update', [settingController::class, 'setting_update'])->name('setting.update');

// meta setting
Route::get('/meta/setting/add', [MetaController::class, 'meta_setting_add'])->name('meta.setting.add');
Route::post('/meta/setting/store', [MetaController::class, 'meta_setting_store'])->name('meta.setting.store');
Route::post('/meta/setting/update', [MetaController::class, 'meta_setting_update'])->name('meta.setting.update');
Route::post('/editmeta/{id}', [MetaController::class, 'editmeta'])->name('editmeta');
Route::get('/meta/setting/delete/{id}', [MetaController::class, 'meta_setting_delete'])->name('meta.setting.delete');

// Product
Route::get('/product/add', [ProductController::class, 'product_add'])->name('product.add');
Route::post('/product/store', [ProductController::class, 'product_store'])->name('product.store');
Route::get('/product/list', [ProductController::class, 'product_list'])->name('product.list');
Route::get('/product/delete/{product_id}', [ProductController::class, 'product_delete'])->name('product.delete');
Route::get('/product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'product_update'])->name('product.update');



// terms policy
Route::get('/terms/condition', [TermsconditionController::class, 'terms_condition'])->name('terms.condition');
Route::get('/terms/privacy/policy', [TermsconditionController::class, 'terms_privacy_policy'])->name('terms.privacy.policy');
Route::post('/terms/conditions/update/{id}', [TermsconditionController::class, 'terms_conditions_update'])->name('terms.conditions.update');
Route::post('/privacy/policy/update/{id}', [TermsconditionController::class, 'privacy_policy_update'])->name('privacy.policy.update');

// portfolio.list
Route::get('/portfolio/list', [ProtfolioController::class, 'portfolio_list'])->name('portfolio.list');
Route::get('/portfolio/add', [ProtfolioController::class, 'portfolio_add'])->name('portfolio.add');
Route::post('/portfolio/store', [ProtfolioController::class, 'portfolio_store'])->name('portfolio.store');
Route::get('/portfolio/edit/{id}', [ProtfolioController::class, 'portfolio_edit'])->name('portfolio.edit');
Route::get('/portfolio/delete/{id}', [ProtfolioController::class, 'portfolio_delete'])->name('portfolio.delete');
Route::post('/portfolio/update', [ProtfolioController::class, 'portfolio_update'])->name('portfolio.update');

// blogs.list
Route::get('/blogs/list', [BlogController::class, 'blogs_list'])->name('blogs.list');
Route::get('/blogs/add', [BlogController::class, 'blogs_add'])->name('blogs.add');
Route::post('/blogs/store', [BlogController::class, 'blogs_store'])->name('blogs.store');
Route::get('/blogs/edit/{id}', [BlogController::class, 'blogs_edit'])->name('blogs.edit');
Route::get('/blogs/delete/{id}', [BlogController::class, 'blogs_delete'])->name('blogs.delete');
Route::post('/blogs/update', [BlogController::class, 'blogs_update'])->name('blogs.update');



// Role management system
Route::get('/role/add', [RoleController::class, 'role'])->name('role');
Route::post('/permission/store', [RoleController::class, 'perimission_store'])->name('permission.store');

/******* Frontend start here *********/

Route::get('/services', [FrontendController::class, 'our_services'])->name('our.services');
Route::get('/services/{slug}', [FrontendController::class, 'services_product'])->name('services.product');
Route::get('/services/details/{slug}', [FrontendController::class, 'services_product_details'])->name('services.product.details');
Route::post('/services/product/checkout', [FrontendController::class, 'services_product_checkout'])->name('services.product.checkout');
Route::post('/services/order/checkout', [FrontendController::class, 'services_order_checkout'])->name('services.order.checkout');
Route::get('/service/order/otp', [FrontendController::class, 'service_order_otp'])->name('service.order.otp');
Route::post('/number/otp', [FrontendController::class, 'number_otp'])->name('number.otp');
Route::get('/service/order/success', [FrontendController::class, 'service_order_success'])->name('service.order.success');

Route::get('/privacy/policy', [FrontendController::class, 'privacy_policy'])->name('privacy.policy');
Route::get('/terms', [FrontendController::class, 'terms'])->name('terms');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/products', [FrontendController::class, 'our_products'])->name('our.products');
Route::get('/product/details/{slug}', [FrontendController::class, 'product_details'])->name('product.details');
Route::get('/our/blogs', [FrontendController::class, 'our_blogs'])->name('our.blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blog_details'])->name('blog.details');
Route::post('/blog/comment/store', [FrontendController::class, 'blog_comment_store'])->name('blog.comment.store');
Route::get('/portfolio/details/{slug}', [FrontendController::class, 'portfolio_details'])->name('portfolio.details');
Route::post('/product/comment/store', [FrontendController::class, 'product_comment_store'])->name('product.comment.store');
Route::get('/cliends', [FrontendController::class, 'our_cliends'])->name('our.cliends');
Route::get('/protfolio', [FrontendController::class, 'our_protfolio'])->name('our.protfolio');
Route::post('/consultancy/store', [FrontendController::class, 'consultancy_store'])->name('consultancy.store');

// paymentmethod
Route::get('/service/order/cancel', [FrontendController::class, 'service_order_cancel'])->name('service.order.cancel');
Route::get('/service/order/ipn', [FrontendController::class, 'service_order_ipn'])->name('service.order.ipn');

// customer dashboard
Route::get('/customer/dashboard', [customerdashboard::class, 'customer_dashboard'])->name('customer.dashboard');
Route::get('/customer/order/history', [customerdashboard::class, 'customer_order_history'])->name('customer.order.history');
Route::get('/customer/shop/history', [customerdashboard::class, 'customer_shop_history'])->name('customer.shop.history');
Route::post('/auth/pay/due', [FrontendController::class, 'auth_pay_due'])->name('auth.pay.due');
// panding customer dashboard
Route::get('/panding/customer/dashboard', [pandingcustomerdashboard::class, 'panding_customer_dashboard'])->name('panding.customer.dashboard');
Route::get('/customer/history', [pandingcustomerdashboard::class, 'customer_history'])->name('customer.history');
Route::post('/pay/due', [pandingcustomerdashboard::class, 'pay_due'])->name('pay.due');

// Customer authentication
Route::get('/customer/login', [CustomerAuthController::class, 'customer_login'])->name('customer.login');
Route::post('/customer/number/login', [CustomerAuthController::class, 'customer_number_login'])->name('customer.number.login');
Route::post('/customer/verify', [CustomerAuthController::class, 'customer_verify'])->name('customer.verify');
Route::get('/customer/verify/view', [CustomerAuthController::class, 'customer_verify_view'])->name('customer.verify.view');
Route::get('/customer/registers', [CustomerAuthController::class, 'customer_registers'])->name('customer.registers');
Route::post('/customer/web/store', [CustomerAuthController::class, 'customer_web_store'])->name('customer.web.store');
Route::get('/customer/auth/logout', [CustomerAuthController::class, 'customer_auth_logout'])->name('customer.logout');
Route::get('/customer/profile', [CustomerAuthController::class, 'customer_profile'])->name('customer.profile');
Route::post('/customer/profile/update', [CustomerAuthController::class, 'customer_profile_update'])->name('customer.profile.update');
Route::get('/order/cancel/{id}', [CustomerAuthController::class, 'order_cancel'])->name('order.cancel');
Route::get('/order/view/{order_id}', [CustomerAuthController::class, 'order_view'])->name('order.view');



// Cart
Route::post('/add-to-cart', [CartController::class, 'cart_store']);
Route::post('/quick-to-cart', [CartController::class, 'quick_cart_store']);
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/load-cart-data', [CartController::class, 'cartloadbyajax']);
Route::post('/update-to-cart', [CartController::class, 'update_cart']);
Route::delete('/delete-from-cart', [CartController::class, 'delete_from_cart']);
Route::get('/clear-cart', [CartController::class, 'clear_cart']);
Route::post('/add_single_cart', [CartController::class, 'cart_single_store']);


// Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

// Order
Route::post('/order/store', [CheckoutController::class, 'order_store'])->name('order.store');
Route::get('/order/success', [CheckoutController::class, 'order_success'])->name('order.success');

// Coupon
Route::get('/coupon/add', [CouponController::class, 'coupon_add'])->name('coupon.add');
Route::get('/coupon/delete/{coupon_id}', [CouponController::class, 'coupon_delete'])->name('coupon.delete');
Route::get('/coupon/edit/{coupon_id}', [CouponController::class, 'coupon_edit'])->name('coupon.edit');
Route::get('/coupon/list', [CouponController::class, 'coupon_list'])->name('coupon.list');
Route::post('/coupon/store', [CouponController::class, 'coupon_store'])->name('coupon.store');
Route::post('/coupon/update', [CouponController::class, 'coupon_update'])->name('coupon.update');
Route::post('/check-coupon-code', [CouponController::class, 'check_coupon_code']);

// Buy
Route::post('/buy/store', [BuyController::class, 'buy_store'])->name('buy.store');

// Shop
Route::get('/product/checkout/view', [ShopController::class, 'product_checkout_view'])->name('product.checkout.view');
Route::post('/shop/product/checkout', [ShopController::class, 'shop_product_checkout'])->name('shop.product.checkout');
Route::get('/product/mobile/varify', [ShopController::class, 'product_mobile_varify'])->name('product.mobile.varify');
Route::post('/shop/number/otp', [ShopController::class, 'shop_number_otp'])->name('shop.number.otp');
Route::get('/shop/order/success', [ShopController::class, 'shop_order_success'])->name('shop.order.success');
Route::get('/shop/order/cancel', [ShopController::class, 'shop_order_cancel'])->name('shop.order.cancel');
Route::get('/shop/order/ipn', [ShopController::class, 'shop_order_ipn'])->name('shop.order.ipn');

// shopproduct
Route::get('shop/product/list', [ShopProductController::class, 'shop_product_list'])->name('shop.product.list');
Route::get('shop/product/add', [ShopProductController::class, 'shop_product_add'])->name('shop.product.add');
Route::post('shop/product/store', [ShopProductController::class, 'shop_product_store'])->name('shop.product.store');
Route::get('shop/product/delete/{id}', [ShopProductController::class, 'shop_product_delete'])->name('shop.product.delete');
Route::get('shop/product/edit/{id}', [ShopProductController::class, 'shop_product_edit'])->name('shop.product.edit');
Route::post('shop/product/update', [ShopProductController::class, 'shop_product_update'])->name('shop.product.update');

//shop category
Route::get('shop/category/list', [ShopcategoryController::class, 'shop_category_list'])->name('shop.category.list');
Route::post('shop/category/store', [ShopcategoryController::class, 'shop_category_store'])->name('shop.category.store');
Route::post('editshopcategory/{id}', [ShopcategoryController::class, 'editshopcategory'])->name('editshopcategory');
Route::post('shop/category/update', [ShopcategoryController::class, 'shop_category_update'])->name('shop.category.update');
Route::get('shop/category/delete/{id}', [ShopcategoryController::class, 'shop_category_delete'])->name('shop.category.delete');

//shop order
Route::get('shop/order/list', [ShopOrderController::class, 'shop_order_list'])->name('shop.order.list');
Route::get('shop/order/delete/{id}', [ShopOrderController::class, 'shop_order_delete'])->name('shop.order.delete');

// Contact
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::post('/contact/message', [ContactController::class, 'contact_message'])->name('contact.message');
Route::get('/contact/list', [ContactController::class, 'contact_list'])->name('contact.list');
Route::get('/contact/message/delete/{message_id}', [ContactController::class, 'contact_message_delete'])->name('contact.message.delete');
Route::post('/contactMessage', [ContactController::class, 'contactMessage']);
Route::get('/contact/delete/all', [ContactController::class, 'contact_delete_all'])->name('contact.delete.all');
Route::get('/contact/info', [ContactController::class, 'contact_info'])->name('contact.info');
Route::post('/contact/info/store', [ContactController::class, 'contact_info_store'])->name('contact.info.store');
Route::get('/contact/info/list', [ContactController::class, 'contact_info_list'])->name('contact.info.list');
Route::get('/contact/info/delete/{contact_id}', [ContactController::class, 'contact_info_delete'])->name('contact.info.delete');
Route::get('/contact/info/edit/{contact_id}', [ContactController::class, 'contact_info_edit'])->name('contact.info.edit');
Route::post('/contact/info/update', [ContactController::class, 'contact_info_update'])->name('contact.info.update');
Route::get('/contact/info/status/{status_id}', [ContactController::class, 'contact_info_status'])->name('contact.info.status');
// Route::get('/contact/message', [ContactController::class, 'contact_message'])->name('contact.message');


Route::get('/login/google', [CustomerAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [CustomerAuthController::class, 'handleGoogleCallback']);


// invoice.download
Route::get('/invoice/download/{order_id}', [invoiceController::class, 'invoice_download'])->name('invoice.download');

// subscribe.store
Route::post('/subscribe/store', [FrontendController::class, 'subscribe_store'])->name('subscribe.store');
Route::get('/subscribe/list', [SubscribeController::class, 'subscribe_list'])->name('subscribe.list');
Route::get('/subscribe/delete/{id}', [SubscribeController::class, 'subscribe_delete'])->name('subscribe.delete');

// whatapp
Route::get('/send-whatsapp', [WhatsappController::class, 'sendWhatsAppMessage']);

// landing
Route::get('/successful/online/business/with/digital/marketing', [LandingController::class, 'landing'])->name('landing');

// consultancy
Route::get('/consultancy/list', [ConsultancyController::class, 'consultancy_list'])->name('consultancy.list');
Route::get('/consultancy/delete/{id}', [ConsultancyController::class, 'consultancy_delete'])->name('consultancy.delete');

