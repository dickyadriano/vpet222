<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $show = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'products.userID', '=', 'users.id')
            ->select('orders.*', 'products.productName')
            ->get();

        $service_data = DB::table('orders')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->join('services', 'orders.serviceID', '=', 'services.id')
            ->select(['orders.*', 'services.*'])
            ->get();

        $product_data = DB::table('orders')
            ->join('products', 'orders.productID', '=', 'products.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->select('orders.*', 'products.*')->get();

        $medicine_data = DB::table('orders')
            ->join('medicines', 'orders.medicineID', '=', 'medicines.id')
            ->join('users', 'orders.userID', '=', 'users.id')
            ->select('orders.*', 'medicines.*')->get();

        if (Auth::user()->type == 'petShop'){
            return view('petShop.order', compact('show'));
        }
        elseif (Auth::user()->type == 'customer'){
            return view('customer.order', compact('service_data', 'product_data', 'medicine_data'));
        }
    }

    public function orderHistory()
    {
        $show = Order::where('petShopID', '=', Auth::user()->id)->get();
        return view('petShop.modal.history', compact('show'),[
            "title" => "Shop Order"
        ]);
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
        $data = Order::create($request->all());
        $data->save();
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
        return view('petShop.modal.orderInfo', compact('order'),[
            "title" => "Shop Order"
        ]);
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
