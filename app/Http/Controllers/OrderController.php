<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
//        $this->middleware('petShop')->only('show');
//        $this->middleware('vetClinic')->only('orderHistory');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
//        $show = Order::where('userID', '=', Auth::user()->id)->get();

        $show = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'products.userID', '=', 'users.id')
            ->select('orders.*', 'products.productName')
            ->get();

        $showService = DB::table('orders')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->join('users', 'services.userID', '=', 'users.id')
            ->select('orders.*', 'services.serviceName')
            ->get();

        $showClinic = DB::table('orders')
            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
            ->join('users', 'medicines.userID', '=', 'users.id')
            ->select('orders.*', 'medicines.medicineName')
            ->get();

        $service_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select(['orders.*', 'services.*'])
            ->get();

        $product_data = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select('orders.*', 'products.*')->get();

        $medicine_data = DB::table('orders')
            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select('orders.*', 'medicines.*')->get();

        $petCare_data = DB::table('orders')
            ->join('pet_cares', 'orders.petCareID', '=', 'pet_cares.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select('orders.*', 'pet_cares.*')->get();

        $grooming_data = DB::table('orders')
            ->join('groomings', 'orders.groomingID', '=', 'groomings.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select('orders.*', 'groomings.*')->get();

        $vaccine_data = DB::table('orders')
            ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Accepted')
            ->select('orders.*', 'vaccines.*')->get();

        $payment_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->select('users.*', 'orders.*')->get();

        if (Auth::user()->type == 'petShop'){
            return view('petShop.order', compact('show'));
        }
        elseif (Auth::user()->type == 'customer'){
            return view('customer.order', compact('vaccine_data','service_data','grooming_data','petCare_data','product_data', 'medicine_data'));
        }
        elseif (Auth::user()->type == 'veterinary'){
            return view('veterinary.order', compact('showService'));
        }
        elseif (Auth::user()->type == 'vetClinic'){
            return view('vetClinic.order', compact('showClinic'),[
                "title" => "Order"
            ]);
        }
        elseif (Auth::user()->type == 'admin'){
            return view('admin.payment', compact('payment_data'),[
                "title" => "Payment"
            ]);
        }
        else{
            return redirect()->back();
        }
    }

    public function orderHistory()
    {
//        $show = Order::where('userID', '=', Auth::user()->id)->get();
        $show = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'products.userID', '=', 'users.id')
            ->select('orders.*', 'products.productName')
            ->get();

        $showService = DB::table('orders')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->join('users', 'services.userID', '=', 'users.id')
            ->select('orders.*', 'services.serviceName')
            ->get();

        $showClinic = DB::table('orders')
            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
            ->join('users', 'medicines.userID', '=', 'users.id')
            ->select('orders.*', 'medicines.medicineName')
            ->get();

        $showOrder = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.orderStatus', '=', 'Reviewed')
            ->get();

        $payment_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->select('users.*', 'orders.*')->get();

        $service_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select(['orders.*', 'services.*'])
            ->get();

        $vaccine_data = DB::table('orders')
            ->join('vaccines', 'orders.vaccineID', '=', 'vaccines.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select('orders.*', 'vaccines.*')->get();

        $product_data = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select('orders.*', 'products.*')->get();

        $medicine_data = DB::table('orders')
            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select('orders.*', 'medicines.*')->get();

        $petCare_data = DB::table('orders')
            ->join('pet_cares', 'orders.petCareID', '=', 'pet_cares.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select('orders.*', 'pet_cares.*')->get();

        $grooming_data = DB::table('orders')
            ->join('groomings', 'orders.groomingID', '=', 'groomings.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->where('orders.userID','=',Auth::user()->id)
            ->where('orders.orderStatus','=', 'Completed')
            ->orWhere('orders.orderStatus','=', 'Reviewed')
            ->select('orders.*', 'groomings.*')->get();

        if (Auth::user()->type == 'petShop') {
            return view('petShop.modal.history', compact('show'));
        }
        elseif (Auth::user()->type == 'veterinary') {
            return view('veterinary.modal.history', compact('showService'));
        }
        elseif (Auth::user()->type == 'vetClinic') {
            return view('vetClinic.modal.history', compact('showClinic'));
        }
        elseif (Auth::user()->type == 'admin') {
            return view('admin.modal.history', compact('payment_data'));
        }
        elseif (Auth::user()->type == 'customer') {
            return view('customer.orderHistory', compact('showOrder', 'service_data',
                            'vaccine_data', 'product_data', 'medicine_data', 'petCare_data',
                            'grooming_data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cart = $request['userID'];
        $productInCart_data = DB::table('carts')
            ->join('products', 'carts.productID', '=', 'products.id')
            ->where('carts.userID', '=', $cart)
            ->where('carts.orderType', '=', 'product')
            ->select('products.*', 'carts.*')->get();

        $medicineInCart_data = DB::table('carts')
            ->join('medicines', 'carts.medicineID', '=', 'medicines.id')
            ->where('carts.userID', '=', $cart)
            ->where('carts.orderType', '=', 'medicine')
            ->select('medicines.*', 'carts.*')->get();

        $service_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->select(['orders.*', 'services.*'])
            ->get();

        if ($request['orderType'] === 'product'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = '';
            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order = $request->file('receiptImage')->getClientOriginalName();
            }
            foreach ($productInCart_data as $data){
                $data = Order::create(['userID' => $data->userID,
                    'productID' => $data->productID,
                    'orderStatus' => $request->orderStatus,
                    'orderType' => $data->orderType,
                    'orderAmount' => $data->orderAmount,
                    'totalPrice' => $request->totalPrice,
                    'receiptImage' => $order,
                    'orderDetail' => $request->orderDetail]);
            }
        }
        elseif ($request['orderType'] === 'medicine'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = '';
            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order = $request->file('receiptImage')->getClientOriginalName();
            }
            foreach ($medicineInCart_data as $data){

                $data = Order::create(['userID' => $data->userID,
                    'medicineID' => $data->medicineID,
                    'orderStatus' => $request->orderStatus,
                    'orderType' => $data->orderType,
                    'orderAmount' => $data->orderAmount,
                    'totalPrice' => $request->totalPrice,
                    'receiptImage' => $order,
                    'orderDetail' => $request->orderDetail]);
            }
        }
        elseif ($request['orderType'] === 'vaccine'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = Order::create($request->all());

            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order->receiptImage = $request->file('receiptImage')->getClientOriginalName();
                $order->save();
            }
        }
        elseif ($request['orderType'] === 'service'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = Order::create($request->all());

            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order->receiptImage = $request->file('receiptImage')->getClientOriginalName();
                $order->save();
            }
        }
        elseif ($request['orderType'] === 'petCare'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = Order::create($request->all());

            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order->receiptImage = $request->file('receiptImage')->getClientOriginalName();
                $order->save();
            }
        }
        elseif ($request['orderType'] === 'grooming'){
            $this->validate($request, ['receiptImage' => 'required|mimes:jpeg,png,jpg,gif,svg']);

            $order = Order::create($request->all());

            if ($request->hasFile('receiptImage')){
                $request->file('receiptImage')->move('img/orderImages/', $request->file('receiptImage')->getClientOriginalName());
                $order->receiptImage = $request->file('receiptImage')->getClientOriginalName();
                $order->save();
            }
        }

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if (Auth::user()->type == 'petShop') {
            return view('petShop.modal.orderInfo', compact('order'),[
                "title" => "Shop Order"
            ]);
        }
        elseif (Auth::user()->type == 'vetClinic') {
            return view('vetClinic.modal.orderInfo', compact('order'),[
                "title" => "Order"
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        $request->validate(['orderStatus'=>'required']);
        $order->update($request->all());
        return redirect()->back();

//        $verificationStatus = $request->verificationStatus;
//        $id = $request->id;
//
//        $update = [
//            'id' => $id,
//            'verificationStatus' => $verificationStatus
//        ];
//
//        Order::where('id', $request->id)->update($update);
//
//        return redirect()->route('service.index');
    }

    public function updateStatus(Request $request)
    {
        $orderStatus = $request->orderStatus;
        $id = $request->id;

        $update = [
            'id' => $id,
            'orderStatus' => $orderStatus
        ];

        Order::where('id', $request->id)->update($update);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
