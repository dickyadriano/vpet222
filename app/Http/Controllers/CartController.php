<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Medicine;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Method;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $data_cart = DB::table('carts')
            ->join('users', 'carts.userID', '=', 'users.id')
            ->where('carts.userID', '=', Auth::user()->id)
            ->select('carts.*')
            ->get();
        $data_product = Product::all();
        return view('customer.dashboard', compact('data_cart', 'data_product'));
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        $cart->save();


        if($request['orderType'] === 'product'){
            return redirect()->route('customer.index');
        }
        elseif($request['orderType'] === 'medicine'){
            return redirect()->route('medicine.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function delete(Request $request, $cartId)
    {
        $cart=Cart::find($cartId);
        $cart->delete();
        return redirect()->back();
//        if($request->is('customer')){
//            return redirect()->route('customer.index');
//        }
//        elseif($request->is('medicine')){
//            return redirect()->route('medicine.index');
//        }
    }

//    public function ServerFileToExecute(Request $request){
//
//        if(isset($_POST['cashOut']))
//            return redirect()->route('order.store');
//        else if(isset($_POST['delete']))
//            return redirect()->route('cart.destroy');
//    }

}
