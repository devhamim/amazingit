<?php

namespace App\Http\Controllers;

use App\Models\courier;
use App\Models\customers;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //profile
    function profile() {
        // return view('backend.user.profile');
        return view('backend.user.profile');
    }

    // profile_update
    function profile_update(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => '',
            'role' => 'required',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);
        $upload_file = $request->image;

        if($request->image != null) {
            if(Auth::user()->image == null) {
                $ext = $upload_file->getClientOriginalExtension();
                $file_name = Auth::id().'.'.$ext;
                Image::make($upload_file)->save(public_path('uploads/user/'.$file_name));
                User::find(Auth::id())->update([
                    'image' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Profile successfully updated with image.');
            } else {
                $delete_from = public_path('uploads/user/'.Auth::user()->image);
                unlink($delete_from);
                $ext = $upload_file->getClientOriginalExtension();
                $file_name = Auth::id().'.'.$ext;
                Image::make($upload_file)->save(public_path('uploads/user/'.$file_name));
                User::find(Auth::id())->update([
                    'image' => $file_name,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('Profile successfully updated with image.');
            }
        }

        if($request->password == $request->password_confirmation) {
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password),
                'updated_at' => Carbon::now(),
            ]);
        } else {
            return back()->withError('Password credentials do not matched!');
        }

        if($request->status != null) {
            User::find(Auth::id())->update([
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
        }
        if($request->mobile != null) {
            User::find(Auth::id())->update([
                'mobile' => $request->mobile,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            User::find(Auth::id())->update([
                'mobile' => null,
                'updated_at' => Carbon::now(),
            ]);
        }

        if($request->role != null) {
            User::find(Auth::id())->update([
                'role' => $request->role,
                'updated_at' => Carbon::now(),
            ]);
        }

        User::find(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);
        return back()->withSuccess('Profile successfully updated.');
    }

    // user list
    function users() {
        $users = User::where( 'id', '!=', Auth::id())->get();
        return view('backend.user.users', [
            'users' => $users,
        ]);
    }

    // user_delete
    function user_delete($user_id) {
        $user = User::find($user_id);
        if($user->image != null) {
            $delete_from = public_path('uploads/user/'.$user->image);
            unlink($delete_from);
        }
        User::where('id', $user_id)->delete();
        return back()->withSuccess('User deleted successfully');
    }

    // user_register
    function user_register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => '',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ], [
            'password_confirmation.required' => "Confirm password is field required."
        ]);

        if($request->password == $request->password_confirmation) {
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'role' => $request->role,
                'password' => bcrypt($request->password),
                'created_at' => Carbon::now(),
            ]);
            return back()->withSuccess('User register successfully');
        } else {
            return back()->withPassworderror('Password credentials do not matched!');
        }

        return back();
    }

    public function editUser(Request $request, $id) {
        $user = User::find($id);

        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    // user update
    function user_update(Request $request) {
        if($request->user_password != null) {
            $request->validate([
                'user_name' => 'required',
                'user_email' => 'required',
                'role' => 'required',
                'user_password' => 'required',
                'status' => 'required',
            ]);

            if($request->user_password == $request->user_password_confirmation) {
                User::where('id', $request->user_id)->update([
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'password' => bcrypt($request->user_password),
                    'role' => $request->role,
                    'status' => $request->status,
                    'mobile' => $request->mobile,
                    'updated_at' => Carbon::now(),
                ]);
                return back()->withSuccess('User updated successfully');
            } else{
                return back()->withUserpassworderror('Password credentials do not matched');
            }
        } else {
            $request->validate([
                'user_name' => 'required',
                'user_email' => 'required',
                'role' => 'required',
                'status' => 'required',
            ]);

            User::where('id', $request->user_id)->update([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'role' => $request->role,
                'status' => $request->status,
                'mobile' => $request->mobile,
                'updated_at' => Carbon::now(),
            ]);
            return back()->withSuccess('User updated successfully');
        }
    }

    // user_dashbord_view
    function user_order_view(Request $request){

        $id = $request->session()->get('user_id');

        $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if (empty($startDate) && empty($endDate)) {
                $startDate = '';
                $endDate = '';
            }
            else {
                $endDate = Carbon::parse($endDate)->addDay();
                $endDate = $endDate->format('Y-m-d');
            }
            if(!empty($startDate) && !empty($endDate)){
                $order_id = Order::with('rel_to_billing')->whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $total_orders = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->count();
                $total_pending = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 0)->count();
                $total_in_review = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 2)->count();
                $total_due_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 3)->count();
                $total_refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 4)->count();
                $total_completed = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 5)->count();
                $total_canceled = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 6)->count();
                $refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 4)->get();
            }
            else{
                $order_id = Order::with('rel_to_billing')->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $total_orders = Order::where('added_by', $id)->count();
                $total_pending = Order::where('status', 0)->where('added_by', $id)->count();
                $total_in_review = Order::where('status', 2)->where('added_by', $id)->count();
                $total_due_payment = Order::where('status', 3)->where('added_by', $id)->count();
                $total_refund_payment = Order::where('status', 4)->where('added_by', $id)->count();
                $total_completed = Order::where('status', 5)->where('added_by', $id)->count();
                $total_canceled = Order::where('status', 6)->where('added_by', $id)->count();
                $refund_payment = Order::where('status', 4)->where('added_by', $id)->get();
            }
            $couriers = courier::all();
        return view('backend.user.userdashboardview.userorderview', [
            'order_id'=>$order_id,
            'total_orders'=>$total_orders,
            'total_pending'=>$total_pending,
            'total_in_review'=>$total_in_review,
            'total_due_payment'=>$total_due_payment,
            'total_refund_payment'=>$total_refund_payment,
            'total_completed'=>$total_completed,
            'total_canceled'=>$total_canceled,
            'couriers'=>$couriers,
            'refund_payment'=>$refund_payment,
            'defaultStartDate' => $startDate,
            'defaultEndDate' => $endDate,
        ]);
    }

    //user_orders_view_status
    function user_orders_view_status(Request $request, $status){

        $id = $request->session()->get('user_id');

        $startDate = $request->start_date;
            $endDate = $request->end_date;

            if (empty($startDate) && empty($endDate)) {
                $startDate = '';
                $endDate = '';
            }
            else {
                $endDate = Carbon::parse($endDate)->addDay();
                $endDate = $endDate->format('Y-m-d');
            }


            if(!empty($startDate) && !empty($endDate)){
                $order_id = Order::with('rel_to_billing')->whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $order_status = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', $status)->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $total_orders = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->count();
                $total_pending = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 0)->count();
                $total_in_review = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 2)->count();
                $total_due_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 3)->count();
                $total_refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 4)->count();
                $total_completed = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 5)->count();
                $total_canceled = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 6)->count();
                $refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->where('status', 4)->get();
            }
            else{
                $order_id = Order::with('rel_to_billing')->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $order_status = Order::where('status', $status)->where('added_by', $id)->orderBy('created_at', 'desc')->get();
                $total_orders = Order::where('added_by', $id)->count();
                $total_pending = Order::where('status', 0)->where('added_by', $id)->count();
                $total_in_review = Order::where('status', 2)->where('added_by', $id)->count();
                $total_due_payment = Order::where('status', 3)->where('added_by', $id)->count();
                $total_refund_payment = Order::where('status', 4)->where('added_by', $id)->count();
                $total_completed = Order::where('status', 5)->where('added_by', $id)->count();
                $total_canceled = Order::where('status', 6)->where('added_by', $id)->count();
                $refund_payment = Order::where('status', 4)->where('added_by', $id)->get();
            }

        $couriers = courier::all();
        return view('backend.user.userdashboardview.orders_list_status', [
            'order_id'=>$order_id,
            'total_orders'=>$total_orders,
            'total_pending'=>$total_pending,
            'total_in_review'=>$total_in_review,
            'total_due_payment'=>$total_due_payment,
            'total_refund_payment'=>$total_refund_payment,
            'total_completed'=>$total_completed,
            'total_canceled'=>$total_canceled,
            'couriers'=>$couriers,
            'order_status'=>$order_status,
            'refund_payment'=>$refund_payment,
            'defaultStartDate' => $startDate,
            'defaultEndDate' => $endDate,
        ]);
    }

    //customer_list
    function user_customer_list_view(Request $request){

        $user_id = $request->session()->get('user_id');

        $customer_list = customers::where('added_by', $user_id)->orderBy('created_at', 'desc')->get();

        return view('backend.user.userdashboardview.customer',[
            'customer_list'=>$customer_list,
        ]);
    }

    // user_home_view
    function user_home_view(Request $request ,$id){
        $request->session()->put('user_id', $id);

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
            if(!empty($startDate) && !empty($endDate)){
                $month_order = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->orderBy('id', 'DESC')->get();
                $todayOrders = Order::whereDate('created_at', now()->toDateString())->where('added_by', $id)->count();
                $total_orders = Order::whereBetween('created_at', [$startDate, $endDate])->where('added_by', $id)->count();
                $total_pending = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 0)->where('added_by', $id)->count();
                $total_in_review = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 2)->where('added_by', $id)->count();
                $total_due_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 3)->where('added_by', $id)->count();
                $total_refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 4)->where('added_by', $id)->count();
                $total_completed = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 5)->where('added_by', $id)->count();
                $total_canceled = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 6)->where('added_by', $id)->count();
                $refund_payment = Order::whereBetween('created_at', [$startDate, $endDate])->where('status', 4)->where('added_by', $id)->get();
                $customers_count = customers::count();
            }
            else{
                $month_order = Order::orderBy('id', 'DESC')->where('added_by', $id)->get();
                $todayOrders = Order::whereDate('created_at', now()->toDateString())->where('added_by', $id)->count();
                $total_orders = Order::where('added_by', $id)->count();
                $total_pending = Order::where('status', 0)->where('added_by', $id)->count();
                $total_in_review = Order::where('status', 2)->where('added_by', $id)->count();
                $total_due_payment = Order::where('status', 3)->where('added_by', $id)->count();
                $total_refund_payment = Order::where('status', 4)->where('added_by', $id)->count();
                $total_completed = Order::where('status', 5)->where('added_by', $id)->count();
                $total_canceled = Order::where('status', 6)->where('added_by', $id)->count();
                $refund_payment = Order::where('status', 4)->where('added_by', $id)->get();
                $customers_count = customers::where('added_by', $id)->count();
            }
        $product_id = Product::all();
        $products_count = Product::count();
        $users_count = User::count();

        return view('backend.user.userdashboardview.userdashbordview', [
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

    // return_home
    function return_home(Request $request){

        $request->session()->forget('user_id');

        return redirect()->route('home');

    }

}
