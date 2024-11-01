<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\courier;
use App\Models\customers;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $currentMonth = now()->format('Y-m');
        // $month_order =  DB::table('orders')
        //     ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])
        //     ->get();

            $startDate = $request->start_date;
            $endDate = $request->end_date;

            if (empty($startDate) && empty($endDate)) {
                $startDate = '';
                $endDate = '';
            }
            else {
                $endDates = Carbon::parse($endDate)->addDay();
                $endDate = $endDates->format('Y-m-d');
            }
        if(Auth::user()->role == 1){
            if(!empty($startDate) && !empty($endDate)){
                $month_order = Order::whereBetween('created_at', [$startDate, $endDate])->orderBy('id', 'DESC')->get();
                $todayOrders = Order::whereDate('created_at', now()->toDateString())->count();
                $total_orders = Order::whereBetween('created_at', [$startDate, $endDate])->count();
                $total_pending = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 0)->count();
                $total_in_review = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 2)->count();
                $total_due_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 3)->count();
                $total_refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 4)->count();
                $total_completed = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 5)->count();
                $total_canceled = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 6)->count();
                $refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 4)->get();
                $customers_count = customers::count();
            }
            else{
                $month_order = Order::orderBy('id', 'DESC')->get();
                $todayOrders = Order::whereDate('created_at', now()->toDateString())->count();
                $total_orders = Order::count();
                $total_pending = Order::where('status', 0)->count();
                $total_in_review = Order::where('status', 2)->count();
                $total_due_payment = Order::where('status', 3)->count();
                $total_refund_payment = Order::where('status', 4)->count();
                $total_completed = Order::where('status', 5)->count();
                $total_canceled = Order::where('status', 6)->count();
                $refund_payment = Order::where('status', 4)->get();
                $customers_count = customers::count();
            }
        }
        else{
            if(!empty($startDate) && !empty($endDate)){
                $todayOrders = Order::where('added_by', Auth::user()->id)->whereDate('created_at', now()->toDateString())->count();
                $month_order = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
                $total_orders = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->count();
                $total_pending = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 0)->count();
                $total_in_review = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 2)->count();
                $total_due_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 3)->count();
                $total_refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 4)->count();
                $total_completed = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 5)->count();
                $total_canceled = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 6)->count();
                $refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->where('status', 4)->get();
                $customers_count = customers::whereBetween('created_at', [$startDate, $endDate])->where('added_by', Auth::user()->id)->count();
            }
            else{
                $todayOrders = Order::where('added_by', Auth::user()->id)->whereDate('created_at', now()->toDateString())->count();
                $month_order = Order::where('added_by', Auth::user()->id)->orderBy('id', 'DESC')->get();
                $total_orders = Order::where('added_by', Auth::user()->id)->count();
                $total_pending = Order::where('added_by', Auth::user()->id)->where('status', 0)->count();
                $total_in_review = Order::where('added_by', Auth::user()->id)->where('status', 2)->count();
                $total_due_payment = Order::where('added_by', Auth::user()->id)->where('status', 3)->count();
                $total_refund_payment = Order::where('added_by', Auth::user()->id)->where('status', 4)->count();
                $total_completed = Order::where('added_by', Auth::user()->id)->where('status', 5)->count();
                $total_canceled = Order::where('added_by', Auth::user()->id)->where('status', 6)->count();
                $refund_payment = Order::where('added_by', Auth::user()->id)->where('status', 4)->get();
                $customers_count = customers::where('added_by', Auth::user()->id)->count();
            }

        }
        $product_id = Product::all();
        $products_count = Product::count();
        $users_count = User::count();

        return view('home', [
            'defaultStartDate' => $startDate,
            'defaultEndDate' => $endDate,
            'customers_count'=>$customers_count,
            'total_orders'=>$total_orders,
            'users_count'=>$users_count,
            'products_count'=>$products_count,
            'month_order'=>$month_order,
            'total_pending'=>$total_pending,
            'total_in_review'=>$total_in_review,
            'total_due_payment'=>$total_due_payment,
            'total_refund_payment'=>$total_refund_payment,
            'total_completed'=>$total_completed,
            'total_canceled'=>$total_canceled,
            'refund_payment'=>$refund_payment,
            'todayOrders'=>$todayOrders,
            'statusCounts' => [
                'pending' => $total_pending,
                'in_review' => $total_in_review,
                'due_payment' => $total_due_payment,
                'refund_payment' => $total_refund_payment,
                'completed' => $total_completed,
                'canceled' => $total_canceled,
            ],
        ]);
    }




    // clear_all_cash
    function clear_all_cash(){
        Artisan::call('cache:clear');

        Artisan::call('view:clear');

        Artisan::call('route:clear');

        Artisan::call('config:clear');

        Artisan::call('optimize');

        return back()->withSuccess('cache clear Successfully');
    }
}
